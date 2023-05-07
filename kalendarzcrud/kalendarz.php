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
        <h1>KALENDARZ</h1>
        <?php 
$conn = mysqli_connect('localhost','root','','egzamin5');

$query = $conn -> query("SELECT miesiac,rok FROM zadania WHERE dataZadania = '2020-07-01'");
while(list($miesiac,$rok)=mysqli_fetch_row($query)){
    echo('<form method="post" action="kalendarz.php">
        <h3>miesiąc: <select name="miesiacxdd" onchange="this.form.submit()">
        <option value="0">Wybierz</option>
        <option value="Styczeń">Styczeń</option>
        <option value="Luty">Luty</option>
        <option value="Marzec">Marzec</option>
        <option value="Kwiecień">Kwiecień</option>
        <option value="Maj">Maj</option>
        <option value="Czerwiec">Czerwiec</option>
        <option value="lipiec">Lipiec</option>
        <option value="sierpien">Sierpień</option>
        <option value="Wrzesień">Wrzesień</option>
        <option value="Październik">Październik</option>
        <option value="listopad">Listopad</option>
        <option value="Grudzień">Grudzień</option>
    </select></form>
    rok: '.$rok.'</h3>');
}

if($_SESSION['loggedin']==0){
    echo('<button class="button-37"><a href="zaloguj.php">zaloguj się</a></button>');
}else{
    echo('<button class="button-37"><a href="kalendarzdelete.php">Panel sterowania</a></button><br><br>');

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1){ 
        echo("<div class='wyloguj'>
        <button class='button-37' name='logout' action='zaloguj.php'>
            <a href='kalendarz.php?wyloguj=yes'> Wyloguj </a>
        </button>
    </div>");
    }
    
    if(isset($_GET['wyloguj'])){
        if($_GET['wyloguj']=="yes"){
            $_SESSION["loggedin"] = 0;
            echo("
            <script type='text/javascript'>
                alert('Wylogowano pomyślnie');
            </script>
            ");
            header('Location:kalendarz.php');
        }else{
            echo'error';
        }
    }
}
?>
</div>
<div class="main">
<?php 
if(isset($_POST['miesiacxdd'])){
    $mies = $_POST['miesiacxdd'];
    $query2 = $conn -> query("SELECT dataZadania, wpis FROM zadania WHERE miesiac = '$mies'");
    while(list($data,$wpis)=mysqli_fetch_row($query2)){
        echo("
            <div class='day'>
                <h5>$data</h5>
                <p>$wpis</p>
            </div>
        ");
    }
}
?>
</div>

        
    </div>
    <footer class="stopka">
        <form action="kalendarz.php" method="POST">
            <label for="wpis">dodaj wpis:<input type="text" name="wpis_added"> <button name="submit" type="submit">DODAJ</button></label>
            <br>
            <p>Stronę wykonał: Dawid Nikiel</p>
        </form>
        <?php 
            if(isset($_POST['submit'])){
                $wpis_added = $_POST['wpis_added'];
                $query3 = $conn->query("UPDATE `zadania` SET `wpis`='$wpis_added' WHERE dataZadania = '2020-07-13';");
                echo '<meta http-equiv="refresh" content="0">';
            }
        ?>
    </footer>

</body>
</html>