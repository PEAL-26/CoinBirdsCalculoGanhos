<?php 
$scriptDatabase = "mysql";
$hostDatabase = "localhost";
$userDatabase = "root";
$passDatabase = "";
$dbDatabase = "";

$conexao = mysqli_connect($hostDatabase, $userDatabase, $passDatabase) or die(mysqli_error($conexao));