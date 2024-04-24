<?php
include_once("config.php");

date_default_timezone_set("America/Fortaleza");

$data = date("Y-m-d");
$hora = date("H:i:s");

echo $data . "<br>";
echo $hora . "<br>";

$sqlDelete = mysqli_query($conexao, "SELECT * FROM reservas1 WHERE dia='$data' AND termino='$hora'");

if ($sqlDelete->num_rows > 0) {
    $sql = mysqli_query($conexao, "DELETE FROM reservas1 WHERE dia='$data' AND termino='$hora'");
}
else {
    echo "0";
}