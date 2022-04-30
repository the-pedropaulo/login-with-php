<?php 
session_start();
ob_start();
include_once 'conection/conection.php';
if(!isset($_SESSION['name'])) {
    $_SESSION['msg'] = "<p style='color: red'>Necessário fazer login!</p>";
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Dashboard</h1>

    <h2>Bem-vindo, <?php echo $_SESSION['name']; ?></h2>

    <a href="logout.php">Sair</a>
</body>
</html>