<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Consulta Motorista</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
           <div class="detalheProdutoContainer">
             <?php include('consulta_cad_detalhe_motorista.php')?>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
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
    if(confirm("Deseja realmente alterar esse motorista?")){
    $.post("altera_motorista.php",
    {
      "index": index,
      "nome": nome,
      "email": email,
      "senha": senha
    }, function (result){
      alert(result);
      window.location="cadmotorista.php";
    });
    };
  }
  function voltar() {
    window.location = "cadmotorista.php";
  }
  </script>
  </html>
