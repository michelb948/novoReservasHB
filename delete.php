<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
</head>
<body>
    <h1>Tem certeza que deseja excluir esta reserva?</h1>
    <?php
    $id = $_GET['id'];

    echo "<a href='controllerDelete.php?id=$id'>Sim</a>";
    echo "<a href='home.php'>Cancelar</a>";
    ?>
</body>
</html>