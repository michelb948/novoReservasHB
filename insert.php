<?php
include_once("config.php");

if (isset($_POST['submit'])) {
    
    $nome = ($_POST['nome']);
    $equipamento = ($_POST['equipamento']);
    $data = $_POST['data'];
    $aulas = ($_POST['aula']);
    
    //converter array aulas e equipamento para string
    $aulas1 = implode($aulas);
    $equipamento1 = implode($equipamento);

    //Não reservar se o mesmo equipamento for solicitado para os mesmos horários
    $query = "SELECT * FROM reservas1 WHERE equipamento='$equipamento1' AND aulas='$aulas1' AND dia='$data'";
    $result = $conexao->query($query);

    if ($result->num_rows > 0) {
        echo "Reserva não pôde ser feita, pois alguém já reservou este equipamento para estas aulas";
    }

    else
    {
        $maiorAula = max($aulas);
        $sqlTermino = mysqli_query($conexao, "SELECT termino FROM aulas WHERE aula='$maiorAula'");
        //$termino recebe 1, não a hr;
        if ($sqlTermino->num_rows > 0) {
            while ($user_data = mysqli_fetch_assoc($sqlTermino)) {
                $termino = $user_data['termino'];
                $termino1 = strval($termino);
            }    
        }    
        else {
            echo "Não foi possivel achar o termino da aula";
        }

        $result1 = mysqli_query($conexao, "INSERT INTO reservas1 (nome, equipamento, aulas, dia, termino) VALUES ('$nome', '$equipamento1', '$aulas1', '$data', '$termino1')");
    }

    if ($result1) {
        header("location: home.php");
    }
}    

    
    //$delete = "SELECT * FROM reservas1 WHERE now() NOT BETWEEN created_at AND exclusao_reserva";
    //$result2 = $conexao->query($delete);

    //if ($result2->num_rows > 0)
    //{
    //    $sql = mysqli_query($conexao, "DELETE FROM reservas1 WHERE now() NOT BETWEEN created_at AND // exclusao_reserva");
    //}
    //-----------------------------------------------------------------------------------------------    


