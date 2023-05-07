<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css?v=<?php echo time(); ?>">
</head>
<body>
    
    <div class="baner1">
        <a href="kalendarz.php"><img src="logo1.png" alt="Mój kalendarz"></a>
    </div>
    <div class="baner2">
        <h1>LOGOWANIE</h1>
    </div>
    <div class="main">
    <form method="POST">
        <center>
            Nazwa użytkownika: <input type="text" name='name' placeholder="Podaj swój nickname"><br><br>
            Hasło: <input type="password" name='haslo' placeholder="Podaj hasło"><br><br>
            <button class="button-36" name='submit'>Zaloguj</button><br><br><br><br>
            <button class="button-36"><a href="register.php">Zarejestruj się</a></button>
        </center>
    </form>

    <?php
$conn = mysqli_connect('localhost','root','','egzamin5');
        if(isset($_POST['submit'])){
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
                        echo("
                        <script type='text/javascript'>
                            alert('Nie udało się zalogować');
                        </script>
                        ");
                    }
                }
            }
            
        }


    ?>
    </div>
    <footer class="stopka">
            <p>Stronę wykonał: Dawid Nikiel</p>
    </footer>

</body>
</html>