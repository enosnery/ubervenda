<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
//include("/inc/verifica_sessao.inc");
$index = $_SESSION['prodIndex'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT idusuario, nome, email FROM usuario WHERE idusuario = $index;";

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
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
  $email = $row['email'];
	$id = $row['idusuario'];
	$nome = $row['nome'];
	echo "<input id='index' name='index' type='hidden' value='$id'>";
  echo "<label for='nome'>Nome</label>";
	echo "<input id='nome' name='nome' class='prodDetailInput centAlign' value='$nome' />";
  echo "<label for='email'>Valor</label>";
	echo "<input id='email' name='email' class='prodDetailInput centAlign' value='$email' />";
  echo "<label for='senha'>Senha</label>";
	echo "<input id='btn-senha' name='senha' class='prodDetailInput centAlign' value='' disabled>";
  echo "<button type='button' class='btn btn-primary' onclick='liberaSenha();'> Alterar Senha</button> ";
  echo "</input>";
}
}


?>
