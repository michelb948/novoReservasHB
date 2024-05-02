<?php
session_start();

if(!empty($_GET['id']))
{
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT nome FROM reservas1 WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
        }
        
        //if ($nome !== $_SESSION['nome']) {
        //    echo "Opa professor, você não pode apagar a reserva de outra pessoa" . "<br>";
        //    echo "<button><a href='home.php'>Voltar</a></button>";
        //}

        //else {
            echo "<h1>Tem certeza que deseja apagar esta reserva?</h1>" . '<br>';
            echo "<a href='excluirReserva.php?id=$id'>Sim</a>" . "<br>";
            echo "<a href='home.php'>Cancelar</a>";
        //}
    }
}
   
?> 