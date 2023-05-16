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
        <h1>Rejestracja</h1>
    </div>
    <div class="main">
        <form action="register.php" method="post">
            <center>
                <br><br><br>
                    Nazwa użytkownika: <input type="text" name='name'><br><br>
                    Hasło: <input type="password" name='haslo1'><br><br>
                    Powtórz hasło: <input type='password' name='haslo2'><br><br>
                    <button type="submit" class="button-36" name='submit'>Utwórz konto</button>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br>
            </center>
        </form>
        <?php 
        $conn = mysqli_connect('localhost','root','','egzamin5');
            if(isset($_POST['submit'])){
                if($_POST['haslo1']==$_POST['haslo2']){

                
                $name = $_POST['name'];
                $haslo = sha1($_POST['haslo1']);

                $queryuser = $conn -> query("INSERT INTO `login`(`name`, `haslo`) VALUES ('$name','$haslo')");

                echo("
                        <script type='text/javascript'>
                            alert('Zarejestrowano pomyślnie');
                        </script>
                        ");
            }else{
                echo("<script>alert('Hasła się nie zgadzają');</script>");

                }
            }
        ?>
    </div>
    <footer class="stopka">
            <p>Stronę wykonał: Dawid Nikiel</p>
    </footer>

</body>
</html>