<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Alterar Usuário</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
           <div class="detalheProdutoContainer">
             <?php include('cad_detalhe_usuario.php')?>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='button' class="btn btn-link seguirButton" title="Alterar" onclick="alterarUsuario();">Alterar</button>
             </div>
           </div>
     </div>

  </body>
  <script type="text/javascript">
  function liberaSenha(){
    $("#btn-senha").removeAttr("disabled");
    $("#btn-senha").css("background-color","white");
    $("#btn-senha").css("border-bottom","2px solid gainsboro");
  }
  function alterarUsuario() {
    var index = document.getElementById("index").value;
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("btn-senha").value;
    if(confirm("Deseja realmente alterar esse usuário?")){
    $.post("altera_usuario.php",
    {
      "index": index,
      "nome": nome,
      "email": email,
      "senha": senha
    }, function (result){
      alert(result);
      window.location="cadusuario.php";
    });
    };
  }
  function voltar() {
    window.location = "cadusuario.php";
  }
  </script>
  </html>
