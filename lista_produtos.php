<?php
include("inc/conectar.inc");
// include("inc/verifica_sessao.inc");
$idmotorista = $_SESSION['$motorista'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT p.id, p.descricao, p.picture_url, p.valor::money::numeric, e.quantidade_atual FROM produtos p inner join estoque_motorista e on e.id_produto = p.id where e.idmotorista = $idmotorista and e.quantidade_atual > 0 ORDER BY id;";


$resultado = pg_query($conexao, $produtos);

//verifica se a query retornou algum resultado
//print odbc_errormsg($conexao);
$num_linhas = pg_num_rows($resultado);

//echo $num_linhas." - Linhas</br>";
//echo $res." - Resultado</br>"
 // $result = $pg_fetch_all($resultado);
//$login = $resultado['LOGIN'];

//se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0)
	{
echo "<table id=cadprodTable>";
echo "<tr>";
$i = 0 ;
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
  $imagem = $row['picture_url'];
	$id = $row['id'];
	$value = str_replace( '.', '', number_format($row['valor'], 2, '.', ''));
	$reais = number_format($row['valor'], 2, '.', '');
	$amount = $row['quantidade_atual'];
  echo "<td class='col-md-6 centAlign'> ";
	echo "<table id='tableItem'>";
	echo "<tr>";
	echo "<td style='width:10%'>";
  echo "<span class='centAlign iconeplus glyphicon glyphicon-plus-sign' onclick='addItem($i, $id, $amount)'>";
	echo "</span>";
	echo "</td>";
	echo "<td>";
	echo "<input id='product-id-$i' type='hidden' value='$id'>";
	echo "<input id='product-value-$i' type='hidden' value='$value'>";
	echo "<input id='product-amount-$i' type='hidden' value='$amount'>";
  echo "<img style='width:80%' class='centAlign productsImage img-responsive' src='$imagem' />";
	echo "<span style='font-size:11px;	'>R$ $reais";
	echo "</span>";
	echo "</td>";
	echo "<td style='width:10%'>";
	echo "<span class='centAlign iconeminus glyphicon glyphicon-minus-sign' onclick='removeItem($i, $id)'>";
	echo "</span>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
  echo "</td>";
  if ($i%2==0) {
  echo "</tr>";
  echo "<tr>";
}
      }
echo "</table>";

}

?>
