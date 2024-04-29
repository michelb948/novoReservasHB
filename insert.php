<?php
include_once("config.php");

if (isset($_POST['submit'])) {
    
    $nome = ($_POST['nome']);
    $equipamento = ($_POST['equipamento']);
    $data = $_POST['data'];
    $aulas = ($_POST['aula']);
    
    //Tem como usar o max() para comparar strings
    //converter array aulas e equipamento para string
    $aulas1 = implode($aulas);
    $equipamento1 = implode($equipamento);

    //-------------------------------------------------------------------------------------------
    $iguais = mysqli_query($conexao, "SELECT equipamento, aulas, dia FROM reservas1");

    if ($iguais->num_rows > 0) {
        while ($user_dataIguais = mysqli_fetch_assoc($iguais)){
            $equipamentoIguais = $user_dataIguais['equipamento'];
            $aulasIguais = $user_dataIguais['aulas'];
            $diaIguais = $user_dataIguais['dia'];

        //-------------------------------------------------------------------------------------------
                       
        echo $equipamento1 . "<br>";
        echo $equipamentoIguais . "<br>";

        if (preg_match("/$equipamento1/", $equipamentoIguais) || preg_match("/$equipamentoIguais/", $equipamento1)) {
            if (preg_match("/$aulas1/", $aulasIguais) || preg_match("/$aulasIguais/", $aulas1)) {
                if ($data == $diaIguais) {
                    echo "Reserva não pôde ser feita pois alguém já reservou este(s) equipamento(s) para tal data";
                }
                //3º Else --------------------------------------------------------------------------
                else
                {
                    $maiorAula = max($aulas);
                    $sqlTermino = mysqli_query($conexao, "SELECT termino FROM aulas WHERE aula='$maiorAula'");
                    
                    if ($sqlTermino->num_rows > 0) {
                        while ($user_data = mysqli_fetch_assoc($sqlTermino)) {
                            $termino = $user_data['termino'];
                            $termino1 = strval($termino);
                        }    
                    }    
                    else {
                        echo "Não foi possivel achar o termino da aula";
                    }

                    //$result1 = mysqli_query($conexao, "INSERT INTO reservas1 (nome, equipamento, aulas, dia, termino) VALUES ('$nome', '$equipamento1', '$aulas1', '$data', '$termino1')");
                    
                    //if ($result1) {
                        //header("location: home.php");
                    //}
                    //else {
                      //  echo "afffff";
                    //}
                }
                //----------------------------------------------------------------------------------
            }
            // 2º Else---------------------------------------------------------------------------- 
            else
            {
                $maiorAula = max($aulas);
                $sqlTermino = mysqli_query($conexao, "SELECT termino FROM aulas WHERE aula='$maiorAula'");
                
                if ($sqlTermino->num_rows > 0) {
                    while ($user_data = mysqli_fetch_assoc($sqlTermino)) {
                        $termino = $user_data['termino'];
                        $termino1 = strval($termino);
                    }    
                }    
                else {
                    echo "Não foi possivel achar o termino da aula";
                }

                //$result1 = mysqli_query($conexao, "INSERT INTO reservas1 (nome, equipamento, aulas, dia, termino) VALUES ('$nome', '$equipamento1', '$aulas1', '$data', '$termino1')");
                
                //if ($result1) {
                  //  header("location: home.php");
               // }
                //else {
                  //  echo "afffff";
                //}
            }
            //--------------------------------------------------------------------------------------
        }
        // !º Else ----------------------------------------------------------------------------------
        else
        {
            $maiorAula = max($aulas);
            $sqlTermino = mysqli_query($conexao, "SELECT termino FROM aulas WHERE aula='$maiorAula'");
            
            if ($sqlTermino->num_rows > 0) {
                while ($user_data = mysqli_fetch_assoc($sqlTermino)) {
                    $termino = $user_data['termino'];
                    $termino1 = strval($termino);
                }    
            }    
            else {
                echo "Não foi possivel achar o termino da aula";
            }

            //$result1 = mysqli_query($conexao, "INSERT INTO reservas1 (nome, equipamento, aulas, dia, termino) VALUES ('$nome', '$equipamento1', '$aulas1', '$data', '$termino1')");
            
            //if ($result1) {
             //   header("location: home.php");
            //}
            //else {
              //  echo "Algo de errado não está certo ;D";
            //}
        }
        }    
    }
}    