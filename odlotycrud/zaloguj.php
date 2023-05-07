<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="style6.css">
</head>
<body>
    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'egzamin3');
    ?>
    <div class="baner1">
        <h2>Logowanie</h2>
    </div>
    <div class="baner2">
        <a href="airport.php"><img src="zad6.png" alt="logotyp"></a>
    </div>
    <div class="main">

    <form method="POST">
        <center>
            Nazwa użytkownika: <input type="text" name='name' placeholder="Podaj swój nickname"><br><br>
            Hasło: <input type="password" name='haslo' placeholder="Podaj hasło"><br><br>
            <button class="button-5" name='submit'>Zaloguj</button><br><br>
            <button class="button-5"><a href="register.php">Zarejestruj się</a></button>
        </center>
    </form>

    <?php

if(isset($_POST['name']) && isset($_POST['haslo'])){
    if(!empty($_POST['name']) && !empty($_POST['haslo'])){

        $name = htmlspecialchars($_POST['name']);
        $haslo = htmlspecialchars(sha1($_POST['haslo']));


        $queryzaloguj = $conn->query("SELECT name,haslo FROM login where name='$name' AND haslo='$haslo';");

        
            if(mysqli_num_rows($queryzaloguj) == 1){
            list($name,$haslo) = mysqli_fetch_row($queryzaloguj);
            echo("
            <script type='text/javascript'>
                alert('Zalogowano pomyślnie');
            </script>
            ");


            $_SESSION['loggedin'] = 1;
            $_SESSION['name'] = $name;
        }else{
            echo"Nie udało się zalogować";
        }
    }
}

if($_SESSION['loggedin'] == 1){
    echo(" 
    <div class='wyloguj'>
    <button class='button-5' name='logout' action='zaloguj.php'>
        <a href='zaloguj.php?wyloguj=yes'> Wyloguj </a>
    </button>
</div>"
);
}

if(isset($_GET['wyloguj'])){
    if($_GET['wyloguj']=="yes"){
        $_SESSION["loggedin"] = 0;
        echo("
        <script type='text/javascript'>
            alert('Wylogowano pomyślnie');
        </script>
        ");
        header('Location:zaloguj.php');
    }else{
        echo'error';
    }
}

    ?>
    </div>
    <div class="stopka3">
        Autor: Dawid Nikiel
    </div>

</body>
</html>