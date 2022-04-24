<?php 

include_once("conection.php");
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

    <?php 
        session_start();
        ob_start();
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($data['send-login'])) {

            $query = "SELECT id, username, name, password 
            FROM users 
            WHERE username = :username 
            LIMIT 1";

            $prepare_query = $conn->prepare($query);
            $prepare_query->bindParam(':username', $data['username'], PDO::PARAM_STR);
            $prepare_query->execute();

            if(($prepare_query) && ($prepare_query->rowCount() != 0)) {
                $user = $prepare_query->fetch(PDO::FETCH_ASSOC);
                if(password_verify($data['password'], $user['password'])) {
                    $_SESSION['name'] = $user['name'];
                    header("Location: dashboard.php");
                } else {
                    $_SESSION['msg'] = "<p style='color: red'>Usuário ou senha inválidos </p>";
                }
            } else {
                $_SESSION['msg'] = "<p style='color: red'>Usuário ou senha inválidos!</p>";
            }

            
        }

        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <h1>Login</h1>

    <form method="POST" action="">
        <label for="">Usuário</label>
        <input type="text" name="username" placeholder="Digite o usuário"><br><br>

        <label for="">Senha</label>
        <input type="text" name="password" placeholder="Digite a senha"><br>

        <input type="submit" value="Acessar" name="send-login">
    </form>
</body>
</html>