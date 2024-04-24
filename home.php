<?php
session_start();

if (!isset($_SESSION['nome']) == true)
{
    unset($_SESSION['nome']);
    header("location: index.html");
}

include_once("config.php");

$sql = "SELECT * FROM reservas1";

$result = $conexao->query($sql); 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="firstLine">
        <a href="reser/reserva.php">Reservar</a>
        <a href="logOut.php">Sair</a>
    </div>
    <table>
        <thead>
            <th>Nome</th>
            <th>Equipamento</th>
            <th>Dia</th>
            <th>Aulas</th>      
            <th>Ações</th>
        </thead>
        <tbody>
            <?php

            while ($user_data = mysqli_fetch_assoc($result)) {
                $data = $user_data['dia'];
                $date = date('d/m', strtotime($data));

                $string = $user_data['aulas'];

                $string_dividida = str_split($string);

                echo "<tr>";
                echo "<td>" . $user_data['nome'] . "</td>";
                echo "<td>" . $user_data['equipamento'] . "</td>";
                echo "<td>" . $date . "</td>";
                for ($i = 0; $i < count($string_dividida); $i++) {
                    echo "<td>" . $string_dividida[$i] . "ª" . "</td>";
                }
                echo "<td>
                    <a class='btn btn-primary' href='edit.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                        </svg>
                    </a>            
                    <a class='btn btn-primary' href='delete.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                        </svg>
                    </a>
                </td>";     
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>


</body>
</html>