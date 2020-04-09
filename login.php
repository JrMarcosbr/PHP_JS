<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <img class="user" src="img/user.png">
        <h3>Login</h3>
        <form action="controle/control_usu.php" method="post">
            
            <div class="input-box">
                <input type="text" name="usuario" placeholder="Usuario">
                <span><i class="fa fa-user"></i></span>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha">
                <span><i class="fa fa-lock"></i></span>
            </div>
            <input type="submit" name="login" value="login">

        </form>
    </div>
</body>
</html>