<?php

include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT idusuario, nome, email  FROM usuario WHERE not is_usuario_representante and not is_usuario_adm and not is_motorista ORDER BY idusuario;";

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
$i = 0 ;
echo "<table id=cadRepTable>";
echo "<tr>";
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;

	$id = $row['idusuario'];
	$nome = $row['nome'];

	echo "<td style='width:90vw'> ";
	echo "<table id='cadListItem'>";
	echo "<tr>";
  echo "<td id='cadRepDesc'>";
	echo "<span style='margin-left:20px;'>$nome";
	echo "</span>";
	echo "<input id='product-id-$i' type='hidden' value='$id'>";
	echo "<input id='product-value-$i' type='hidden' value='$nome'>";
	echo "</td>";
	echo "<td id='cadProdButton'>";
	echo "<a class='cadRepIcon glyphicon glyphicon-pencil' onclick='goToDetail($id)'>";
	echo "</a>";
	echo "</td>";
	echo "<td id='cadProdButton'>";
	echo "<a class='cadRepIcon glyphicon glyphicon-trash' onclick='removeUser($id)'>";
	echo "</a>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</tr>";
	echo "<tr>";
}
}


?>
