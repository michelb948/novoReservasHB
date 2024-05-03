<?php
include_once("config.php");

if (isset($_POST['submit'])) {
    $dispositivos = ($_POST['equipamento']);
}
$dispositivosString = implode($dispositivos);

$dispositivosArray = explode(",", $dispositivosString);
/*
$a = [1,2,3,45,6,67,88,9,""];

for ($i = 0; $i < count($a); $i++) {
    if ($a[$i] == "") {
        $quantidade = count($a) - 1;    
    }
}
print($quantidade);
*/
    $matriz = [];
    //Definir um valor para variavel $quantidade;
    
    $query = mysqli_query($conexao, "SELECT equipamento, aulas, dia FROM reservas1");
    
    if ($query->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($query)) {
            $array = [];
            $equipamento = explode(",", $user_data['equipamento']);
            array_push($array, $equipamento);
            array_push($matriz, $array);
        }

        
        foreach ($matriz as $linha) {
            print_r($dispositivosArray);
            echo "<br>" . "<br>";
            print_r($linha[0]);
            echo "<br>" . "<br>";
            print_r(array_intersect($linha[0], $dispositivosArray));
            echo "<br>";
            echo "-----------------------------------------------------" . "<br>";
            if (array_intersect($linha[0], $dispositivosArray)) {
                $intersecao = array_intersect($linha[0], $dispositivosArray);
                $quantidade = count($intersecao);
                echo $quantidade . "<br>";
                for ($i = 0; $i < count($intersecao); $i++) {
                    if ($intersecao[$i] == "") {
                        $quantidade = count($intersecao) - 1;
                        //print_r($linha[0]);
                        //echo "<br>";
                        //print_r($dispositivosArray);
                    } 
                }
                
                if ($quantidade !== 0) {
                    echo "opa, temos equipamentos iguais";
                }
            }
        }
        
    }
    