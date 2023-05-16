<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    
    <div class="baner1">
        <h2>Odloty z lotniska</h2>
    </div>
    <div class="baner2">
        <img src="zad6.png" alt="logotyp">
    </div>
    <div class="main">
    <h4>tabelta odlotów | <a href="airport.php">  Powrót</a></h4>

        <table>
            <tr>            
                <td>lp.</td>
                <td>numer rejsu</td>
                <td>czas</td>
                <td>kierunek</td>
                <td>status</td>
            </tr>

            <?php 

    error_reporting(0);

    $conn = mysqli_connect('localhost', 'root', '', 'egzamin3');

    $query = $conn->query("SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC");

    while(list($id, $nr_rejsu, $czas, $kierunek, $status_lotu) = mysqli_fetch_row($query)){
        echo("
            <form method='POST'>
                <input type='hidden' name='id' value='$id'>
                <input type='hidden' name='nr_rejsu' value='$nr_rejsu'>
                <tr>            
                    <td>$id | <button name='delete'>USUŃ</button></td>
                    <td>$nr_rejsu | ");
        
                    if(isset($_POST['edytuj-nr-rejsu']) && $_POST['edytuj-nr-rejsu'] == $id){
                        echo("<input type='text' name='nr_rejsu_edited' value='$nr_rejsu'> <button name='potwierdz1'>OK</button>");
                    } else {
                        echo("<button name='edytuj-nr-rejsu' value='$id'>EDYTUJ</button>");
                    }
    
                    echo("</td>
                    <td>$czas</td>
                    <td>$kierunek</td>
                    <td>$status_lotu</td>
                </tr>
            </form>
        ");
    
        if(isset($_POST['potwierdz1']) && $_POST['id'] == $id){
            $numeredited = $_POST['nr_rejsu_edited'];
            $queryeditnr = $conn->query("UPDATE `odloty` SET `nr_rejsu`='$numeredited' WHERE id = $id ");
            header("Location: airportedit.php");
        }
    
    

        if(isset($_POST['delete'])){
            $idToDelete = $_POST['id'];
            $querydelet = $conn->query("DELETE FROM `odloty` WHERE id=$idToDelete");
            header("Location: airportedit.php");
            exit();
        }
    }
    
    echo("<tr><td><a href='dodaj.php'>Dodaj rekord do bazy</a></td></tr>");
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