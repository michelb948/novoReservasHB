<?php
include_once("config.php");

if (isset($_POST['submit'])) {
    
    $nome = ($_POST['nome']);
    $equipamento = ($_POST['equipamento']);
    $data = $_POST['data'];
    $aulas = ($_POST['aula']);

    echo $nome . "<br>";
    //-------------------------------------------------------------------------------------------
    $aulas1 = implode($aulas);
    $equipamento1 = implode($equipamento);

    $equipamentoArray = preg_split("/ /", $equipamento1);
    
    //-------------------------------------------------------------------------------------------
    $iguais = mysqli_query($conexao, "SELECT equipamento, aulas, dia FROM reservas1");
    
    if ($iguais->num_rows > 0) {
        while ($user_dataIguais = mysqli_fetch_assoc($iguais)){
            $equipamentoIguais = preg_split("/ /", $user_dataIguais['equipamento']);
            $aulasIguais = $user_dataIguais['aulas'];
            $diaIguais = $user_dataIguais['dia'];
        
            print_r($equipamentoIguais); 
            echo "<br>" . "<br>";
        //-------------------------------------------------------------------------------------------
        //TESTES    
        //Digite o code de teste aqui...
        //Pegar dois arrays e compara-los, se tiver algum equipamento/elemento igual, não executa o if


        // Se na interseção, que no caso é o espaço/vírgula, pode verificar se nesse indice houver algo, ou tiver mais de duas letras/caracteres, o numero de intercessão subtrai -1
        
        

        //------------------------------------------------------------------------------------------
            $intersecao = array_intersect($equipamentoIguais, $equipamentoArray); 
            
            if ($intersecao == true) {
                similar_text($aulas1, $aulasIguais, $porc1);
                if ($porc1 > 0) {
                    if ($data == $diaIguais) {
                        echo "Opa, sua reserva não pôde ser feita pois o mesmo equipamento foi reservado para os mesmos horários";
                    }
                }
            }
        //1º Else --------------------------------------------------------------------------
            //else 
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
            //    }
                //else {
                  //  echo "Algo de errado não está certo ;D";
              //  }   
            }   
        }
    }    
}