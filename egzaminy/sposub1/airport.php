<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css?v=<?php echo time(); ?>">
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="escape" value="">
    </form>  

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['escape'])) {
                $pressedKey = $_POST['escape'];
                
                if ($pressedKey === 'Escape') {
                    header("Location: ../index.php");
                }
            }
        }
    ?>  
    <script>
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.querySelector('input[name="escape"]').value = 'Escape';
                document.querySelector('form').submit();
            }
        });
    </script>
    <div class="back">
        <a href="../index.php"><img src="https://cdn-icons-png.flaticon.com/512/17/17445.png"></a>
    </div>
    <div class="baner1">
        <h2>Odloty z lotniska</h2>
    </div>
    <div class="baner2">
        <img src="zad6.png" alt="logotyp">
    </div>
    <div class="main">
        <h4>tabelta odlotów | <a href="airportedit.php">  
        <?php
        
            if($_SESSION['loggedin'] == 1){
                echo("Panel sterowania | <button name='logout' action='airport.php'><a href='airport.php?wyloguj=yes'> Wyloguj </a></button>");

                if(isset($_GET['wyloguj'])){
                    if($_GET['wyloguj']=="yes"){
                        $_SESSION["loggedin"] = 0;
                        echo("
                        <script type='text/javascript'>
                            alert('Wylogowano pomyślnie');
                        </script>
                        ");
                        header('Location:airport.php');
                    }else{
                        echo'error';
                    }
                }
            }else{
                echo("<a href='zaloguj.php'>Zaloguj się</a>");
            }
        
        ?>    

        </a></h4>

        <table>
            <tr>            
                <td>lp.</td>
                <td>numer rejsu</td>
                <td>czas</td>
                <td>kierunek</td>
                <td>status</td>
            </tr>

            <?php 

  

    $conn = mysqli_connect('localhost', 'root', '', 'egzamin3');

    $query = $conn->query("SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC");

    while(list($id, $nr_rejsu, $czas, $kierunek, $status_lotu) = mysqli_fetch_row($query)){
        echo("
            <form method='POST'>
                <input type='hidden' name='id' value='$id'>
                <input type='hidden' name='nr_rejsu' value='$nr_rejsu'>
                <tr>            
                    <td>$id</td>
                    <td>$nr_rejsu</td>
                    <td>$czas</td>
                    <td>$kierunek</td>
                    <td>$status_lotu</td>
                </tr>
            </form>
        ");
    }
?>

        </table>
    </div>
    <div class="stopka1">
        <a href="kw1.jpg">Pobierz obraz</a>
    </div>
    <div class="stopka2">
        <center>
        <?php 
            
            if(isset($_COOKIE['bua'])){
                echo "<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>";
            }else{
                setcookie("bua",'X',time()+3600);

                echo "<p><i>Dzień dobry! sprawdź regulamin naszej strony</i></p>";
            }
            
        ?>
        </center>
    </div>
    <div class="stopka3">
        Autor: Dawid Nikiel
    </div>

</body>
</html>