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
        <h2>Utwórz konto</h2>
    </div>
    <div class="baner2">
        <a href="airport.php"><img src="zad6.png" alt="logotyp"></a>
    </div>
    <div class="main">

    <form method="POST">
        <center>
            Nazwa użytkownika: <input type="text" name='name' placeholder="Podaj swój nickname"><br><br>
            Hasło: <input type="password" name='haslo1' placeholder="Podaj hasło"><br><br>
            Powtórz hasło: <input type="password" name='haslo2' placeholder="Powtórz hasło"><br><br>
            <button class="button-5" name='submit'>Utwórz konto</button>
        </center>
    </form>

    <?php
    
    if(isset($_POST["name"]) && isset($_POST["haslo1"]) && isset($_POST["haslo2"]) ){
        if ($_POST["haslo1"] == $_POST["haslo2"]) {
                
                $name = htmlspecialchars($_POST['name']);
                $haslo = htmlspecialchars(sha1($_POST['haslo1']));
    
                $queryregister = $conn->query("INSERT INTO login (name,haslo) values ('$name','$haslo');");

                echo("
                <script type='text/javascript'>
                    alert('Zarejestrowano pomyślnie');
                </script>
                ");
            }
        }
    ?>
    </div>
    <div class="stopka3">
        Autor: Dawid Nikiel
    </div>

</body>
</html>