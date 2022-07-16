<?php
$scriptDatabase =
    "


";

$hostDatabase = "localhost";
$userDatabase = "root";
$passDatabase = "";
$nameDatabase = "coin_birds_db";
$portDatabase = "3306";

$conexao = mysqli_connect($hostDatabase, $userDatabase, $passDatabase) or die(mysqli_error($conexao));
$databaseExiste = mysqli_select_db($conexao, $nameDatabase);
if (!$databaseExiste) {
    $query = "CREATE DATABASE $nameDatabase; $scriptDatabase";
    $resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

    if (!$resultado) {
        die(mysqli_error($conexao));
    }
}

$databse = mysqli_connect($hostDatabase, $userDatabase, $passDatabase, $nameDatabase, $portDatabase) or die(mysqli_error($conexao));

$resultadoQuery = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 1");
$begeComprado = $resultadoQuery->fetch_assoc();

$resultadoQuery  = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 2");
$verdeComprado = $resultadoQuery->fetch_assoc();

$resultadoQuery  = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 3");
$amareloComprado = $resultadoQuery->fetch_assoc();

$resultadoQuery  = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 4");
$castanhoComprado = $resultadoQuery->fetch_assoc();

$resultadoQuery  = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 5");
$azulComprado = $resultadoQuery->fetch_assoc();

$resultadoQuery  = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 6");
$vermelhoComprado = $resultadoQuery->fetch_assoc();

$resultadoQuery  = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 7");
$reiComprado = $resultadoQuery->fetch_assoc();

$resultadoQuery  = mysqli_query($databse, "SELECT * FROM passaro WHERE id = 8");
$especialComprado = $resultadoQuery->fetch_assoc();

function buscarComprados()
{
    global $databse;
    $resultadoQuery = mysqli_query($databse, "SELECT * FROM passaro");

    $rows = [];
    while ($row = $resultadoQuery->fetch_array(MYSQLI_ASSOC)) {
        $rows[] = $row;
    }

    $databse->close();
    echo json_encode($rows);
}


if (($_GET['operacao'] ?? '') == 'buscar-passaro-comprados') {
    buscarComprados();
}
