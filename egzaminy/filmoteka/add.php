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
        <h1>Dodaj wpis do kalendarza</h1>
    </div>
    <div class="main">
        <form action="add.php" method="post">
            <center>
                <br><br><br>
                    Data zadania: <input type="date" name='data'><br><br>
                    Wpis: <input type="text" name='wpis'><br><br>
                    Miesiąc: 
                    <select name="miesiac">
                        <option value="0">Wybierz</option>
                        <option value="Styczeń">Styczeń</option>
                        <option value="Luty">Luty</option>
                        <option value="Marzec">Marzec</option>
                        <option value="Kwiecień">Kwiecień</option>
                        <option value="Maj">Maj</option>
                        <option value="Czerwiec">Czerwiec</option>
                        <option value="Lipiec">Lipiec</option>
                        <option value="Sierpień">Sierpień</option>
                        <option value="Wrzesień">Wrzesień</option>
                        <option value="Październik">Październik</option>
                        <option value="Listopad">Listopad</option>
                        <option value="Grudzień">Grudzień</option>
                    </select><br><br>
                    Rok: <input type='number' name='rok'><br><br>
                    <button type="submit" class="button-36" name='submit'>Dodaj do bazy danych</button>
                    
            </center>
        </form>
        <?php 
        $conn = mysqli_connect('localhost','root','','egzamin5');
            if(isset($_POST['submit'])){
                $data = $_POST['data'];
                $wpis = $_POST['wpis'];
                $miesiac = $_POST['miesiac'];
                $rok = $_POST['rok'];

                $queryadd = $conn -> query("INSERT INTO zadania (`dataZadania`, `wpis`, `miesiac`, `rok`) VALUES ('$data','$wpis','$miesiac','$rok')");
            }
        ?>
    </div>
    <footer class="stopka">
            <p>Stronę wykonał: Dawid Nikiel</p>
    </footer>

</body>
</html>