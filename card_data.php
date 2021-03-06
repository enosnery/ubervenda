<?php
session_start();
include("inc/conectar.inc");

$idmotorista = $_SESSION['$motorista'];
$transaction = $_SESSION['charge_id'];
$valortotal = $_SESSION['total'];
$brand = $_POST['brand'];
$number = $_POST['number'];
$cvv = $_POST['cvv'];
$expmon = $_POST['expiration_month'];
$expyear = $_POST['expiration_year'];
$street = $_POST['street'];
$streetnumber = $_POST['street_number'];
$neighborhood = $_POST['neighborhood'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$state = $_POST['state'];
$_SESSION['brand'] = $brand;
$_SESSION['number'] = $number;
$_SESSION['cvv'] = $cvv;
$_SESSION['expiration_month'] = $expmon;
$_SESSION['expiration_year'] = $expyear;
$_SESSION['street'] = $street;
$_SESSION['street_number'] = $streetnumber;
$_SESSION['neighborhood'] = $neighborhood;
$_SESSION['zipcode'] = $zipcode;
$_SESSION['city'] = $city;
$_SESSION['state'] = $state;
$current_date = date('Y-m-d H:i:s');

$pendente = "INSERT INTO compras_pendentes (id_motorista, is_pendente, valor_total, transaction_id, date_register) VALUES ($idmotorista, TRUE, $valortotal, $transaction, current_timestamp);";
$resultado = pg_query($conexao, $pendente);

$transactioncarddata = "INSERT INTO temp_card_data (idmotorista, idtransaction, brand, number, cvv, expiration_month, expiration_year, street, street_number, neighboorhood, zipcode, city, state) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13);";
$result = pg_prepare($conexao, "temp_card_data", $transactioncarddata);
$result = pg_execute($conexao, "temp_card_data", array($idmotorista, $transaction, $brand, $number, $cvv, $expmon, $expyear, $street, $streetnumber, $neighborhood, $zipcode, $city, $state));



if (pg_affected_rows($resultado)>0){
header("Location: aguarda_confirmacao.php");
}else{
  echo "Erro ao Criar a Transação!";
}
// header("Location: aguarda_confirmacao.php");
?>
