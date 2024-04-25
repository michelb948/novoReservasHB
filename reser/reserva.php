<?php
session_start();

if(!isset($_SESSION['nome']) == true) 
{
    unset($_SESSION['nome']);
    header("location: ../index.html");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar</title>
    <link rel="stylesheet" href="reserv.css">
</head>

<body>
    <div class="container">

        
    </div>
    <div class="page">
        <form action="../insert.php" method="POST" class="formLogin"  onsubmit="return validarData()">
            <h1>Requerimento de Equipamentos</h1>
            <p>Selecione abaixo as aulas desejadas:</p>
            <div class="grid-container">
                <div class="grid-item">
                    <input type="checkbox" id="aula1" name="aula[]" value="1">
                    <label for="aula1">Aula 1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula2" name="aula[]" value="2">
                    <label for="aula2">Aula 2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula3" name="aula[]" value="3">
                    <label for="aula3">Aula 3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula4" name="aula[]" value="4">
                    <label for="aula4">Aula 4</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula5" name="aula[]" value="5">
                    <label for="aula5">Aula 5</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula6" name="aula[]" value="6">
                    <label for="aula6">Aula 6</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula7" name="aula[]" value="7">
                    <label for="aula7">Aula 7</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula8" name="aula[]" value="8">
                    <label for="aula8">Aula 8</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="aula9" name="aula[]" value="9">
                    <label for="aula9">Aula 9</label>
                </div>
            
            </div>

            
            <!--caixa de seleção nome dos professores-->
            <?php
            include_once("../config.php");

            $nome = $_SESSION['nome'];

            $query = "SELECT * FROM professores WHERE nome='$nome'";

            $result = $conexao->query($query);

            if ($result->num_rows > 0) 
            {
                while ($user_data = mysqli_fetch_assoc($result)) {
                    $professor = $user_data['nome'];
                }
            }

            echo "<select name='nome'> 
                    <option value=$professor> $professor </option> 
                    
                    <option value='Francisco Adalcélio Borges Pimenta'>Francisco Adalcélio Borges Pimenta</option>
                    
                    <option value='Aleks Roque Alexandre da Silva'>Aleks Roque Alexandre da Silva</option>

                    <option value='Lara Severo Vieira'>Lara Severo Vieira</option>

                    <option value='Kelly Lara do Nascimento Sousa'>Kelly Lara do Nascimento Sousa</option>

                    <option value='Sara Ribeiro dos Santos'>Sara Ribeiro dos Santos</option>

                    <option value='Juan Erick Barbosa de Farias'>Juan Erick Barbosa de Farias</option>

                    <option value='Matheus dos santos Albuquerque'>Matheus dos santos Albuquerque</option>

                    <option value='Napoleão Evangelista Pereira da Silva'>Napoleão Evangelista Pereira da Silva
                    </option>

                    <option value='Lidiane Gondim Barros'>Lidiane Gondim Barros</option>
                  </select>";
            ?>
            <!--Fim da caixa de seleção com o nome dos professores-->

            <!--Caixa de seleção dos equipamentos-->
            </select>
            <hr>
            <label class="equipamento" for="Equipamentolabel">Escolha seus equipamentos</label>
            <br>
            <br>
            <label for="projetor">Projetor</label>
            
            <div class="projetor" style="margin-right: 100%;">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 3">
                    <label for="">3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 4">
                    <label for="">4</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 5">
                    <label for="">5</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 6">
                    <label for="">6</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 7">
                    <label for="">7</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 8">
                    <label for="">8</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 9">
                    <label for="">9</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="projetor 10">
                    <label for="">10</label>
                </div>
            </div>     
            <br>
            <hr>
            <br>
            <label for="Roteador">Roteador</label>
            <div class="roteador">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="roteador 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="roteador 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="roteador 3">
                    <label for="">3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="roteador 4">
                    <label for="">4</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="roteador 5">
                    <label for="">5</label>
                </div>
            </div>

            <br>
            <hr>
            <br>

            <label for="">Notebook</label>
            <div class="notebook">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="notebook 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="notebook 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="notebook 3">
                    <label for="">3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="notebook 4">
                    <label for="">4</label>
                </div>
            </div>

            <br>
            <hr>
            <br>

            <label for="">Caixa de som</label>
            <div class="caixa-de-som">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 3">
                    <label for="">3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 4">
                    <label for="">4</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 5">
                    <label for="">5</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 6">
                    <label for="">6</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 7">
                    <label for="">7</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="caixa de som 8">
                    <label for="">8</label>
                </div>
            </div>

            <br>
            <hr>
            <br>

            <label for="">Cabo P2 P10</label>

            <div class="Cabo-p2-p10">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo p2 p10 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo p2 p10 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo p2 p10 3">
                    <label for="">3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo p2 p10 4">
                    <label for="">4</label>
                </div>
                
            </div>

            <br>
            <hr>
            <br>

            <label for="">Cabo HDMI</label>

            <div class="cabo-HDMI">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 3">
                    <label for="">3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 4">
                    <label for="">4</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 5">
                    <label for="">5</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 6">
                    <label for="">6</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 7">
                    <label for="">7</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 8">
                    <label for="">8</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 9">
                    <label for="">9</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo HDMI 10">
                    <label for="">10</label>
                </div>
            </div>

            <br>
            <hr>
            <br>
            <label for="">Cabo de audio RCA</label>
            <div class="cabo-audio-rca">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo audio 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo audio 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="cabo audio 3">
                    <label for="">3</label>
                </div>
                
            </div>

            <br>
            <hr>
            <br>

            <label for="">Extensão</label>
            <div class="Extensão">
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="extensão 1">
                    <label for="">1</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="extensão 2">
                    <label for="">2</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="projetor3" name="equipamento[]" value="extensão 3">
                    <label for="">3</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="projetor4" name="equipamento[]" value="extensão 4">
                    <label for="">4</label>
                </div>
                <div class="grid-item">
                    <input type="checkbox" id="" name="equipamento[]" value="extensão 5">
                    <label for="">5</label>
                
            </div>

            <br>
            <hr>
            <br>
            
        <label for="data">Selecione a data:</label>
        <div class="Data">

        <input type="date" id="data" name="data" required>
        <input type="submit" name="submit" value="Enviar" class="btn">
        <button type="click" onclick="location.href='../home.php'">Voltar</button>
        </form>
    </div>
    <script src="reserv.js"></script>
</body>
</html>