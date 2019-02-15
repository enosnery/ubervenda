<?php
session_start();
include("inc/cabecalho.inc");

?>
<style>
input{
  border-bottom: 1px solid gainsboro;
}
</style>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <button type="button">Dados Para Pagamento</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
          <form action="card_data.php" method="post">
           <div class="detalheProdutoContainer" style="height:70vh;overflow-y:scroll;">
             <label for="nome">Cartão</label>
             <input id="number" class="form-control" type="text" name="number" value=""></input>
             <label for="nome">Mês</label>
             <select id="expiration_month" class="form-control" name="expiration_month" value="">
               <option value="01">01</option>
               <option value="02">02</option>
               <option value="03">03</option>
               <option value="04">04</option>
               <option value="05">05</option>
               <option value="06">06</option>
               <option value="07">07</option>
               <option value="08">08</option>
               <option value="09">09</option>
               <option value="10">10</option>
               <option value="11">11</option>
               <option value="12">12</option>
             </select>
             <label for="nome">Ano</label>
             <select id="expiration_year" class="form-control" name="expiration_year" value="">
               <option value="2019">2019</option>
               <option value="2020">2020</option>
               <option value="2021">2021</option>
               <option value="2022">2022</option>
               <option value="2023">2023</option>
               <option value="2024">2024</option>
               <option value="2025">2025</option>
               <option value="2026">2026</option>
               <option value="2027">2027</option>
               <option value="2028">2028</option>
               <option value="2029">2029</option>
               <option value="2030">2030</option>
             </select>

             <label for="nome">CVV</label>
             <input id="cvv" class="form-control" type="text" name="cvv" value=""></input>
             <label for="nome">Bandeira</label>
             <select id="brand" name="brand" class="form-control">
               <option value="visa">Visa</option>
               <option value="mastercard">MasterCard</option>
               <option value="elo">ELO</option>
               <option value="hipercard">Hipercard</option>
               <option value="diners">Diners</option>
               <option value="amex">American Express</option>
             </select>
             <label for="nome">Endereço</label>
             <input id="street" class="form-control" type="text" name="street" value=""></input>
             <label for="nome">Número</label>
             <input id="street_number" class="form-control" type="text" name="street_number" value=""></input>
             <label for="nome">Bairro</label>
             <input id="neighborhood" class="form-control" type="text" name="neighborhood" value=""></input>
             <label for="nome">CEP</label>
             <input id="zipcode" class="form-control" type="text" name="zipcode" value=""></input>
             <label for="nome">Cidade</label>
             <input id="city" class="form-control" type="text" name="city" value=""></input>
             <label for="nome">Estado</label>
             <select name="state" id="state" class="form-control">
	<option value="AC">Acre</option>
	<option value="AL">Alagoas</option>
	<option value="AP">Amapá</option>
	<option value="AM">Amazonas</option>
	<option value="BA">Bahia</option>
	<option value="CE">Ceará</option>
	<option value="DF">Distrito Federal</option>
	<option value="ES">Espírito Santo</option>
	<option value="GO">Goiás</option>
	<option value="MA">Maranhão</option>
	<option value="MT">Mato Grosso</option>
	<option value="MS">Mato Grosso do Sul</option>
	<option value="MG">Minas Gerais</option>
	<option value="PA">Pará</option>
	<option value="PB">Paraíba</option>
	<option value="PR">Paraná</option>
	<option value="PE">Pernambuco</option>
	<option value="PI">Piauí</option>
	<option value="RJ">Rio de Janeiro</option>
	<option value="RN">Rio Grande do Norte</option>
	<option value="RS">Rio Grande do Sul</option>
	<option value="RO">Rondônia</option>
	<option value="RR">Roraima</option>
	<option value="SC">Santa Catarina</option>
	<option value="SP">São Paulo</option>
	<option value="SE">Sergipe</option>
	<option value="TO">Tocantins</option>
</select>
             <div class="detalheProdutoButtons">
               <button class="btn btn-primary" type="submit">Continuar</button>
             </div>
           </div>
         </form>

     </div>

  </body>
<script type="text/javascript">


</script>