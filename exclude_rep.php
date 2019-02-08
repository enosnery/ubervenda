<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$id = $_POST['index'];

$produtos = "DELETE FROM usuario WHERE idusuario = $1;";
$resultado = pg_prepare($conexao, "query_delete", $produtos);
$resultado = pg_execute($conexao, "query_delete", array($id));
$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    echo "Representante excluído com sucesso!";
  }else{
    echo "Não foi possível excluir esse representante.";
  }


?>
