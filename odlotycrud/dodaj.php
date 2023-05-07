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
        <h2>Dodawanie do bazy</h2>
    </div>
    <div class="baner2">
        <a href="airport.php"><img src="zad6.png" alt="logotyp"></a>
    </div>
    <div class="main">

    <form method="POST">
        <center>
            Numer rejsu: <input type="text" name='nrrejsu' placeholder="Podaj numer rejsu"><br><br>
            Numer samolotu: <input type="text" name='nrsamolotu' placeholder="Podaj numer samolotu"><br><br>
            Godzina odlotu: <input type="time" name="godzina" placeholder='Podaj godzinę odlotu'><br><br>
            Dzień odlotu: <input type='date' name='data' placeholder='Podaj datę odlotu'><br><br>
            Kierunek: <input type="text" name="kierunek" placeholder='Podaj kierunek rejsu'><br><br>
            Status: <input type='text' name="status" placeholder='Podaj status lotu'><br><br>
            <button class="button-5" name='submit'>Dodaj do bazy</button>
        </center>
    </form>

    <?php
    
    if(isset($_POST['submit'])){
        $nrrejsu = $_POST['nrrejsu'];
        $nrsamolotu = $_POST['nrsamolotu'];
        $godzina = $_POST['godzina'];
        $data = $_POST['data'];
        $kierunek = $_POST['kierunek'];
        $status = $_POST['status'];

        $query = $conn->query("INSERT INTO `odloty`(`samoloty_id`, `nr_rejsu`, `kierunek`, `czas`, `dzien`, `status_lotu`) VALUES ('$nrsamolotu','$nrrejsu','$kierunek','$godzina','$data','$status');");

        echo("
        <script type='text/javascript'>
            alert('Dodano rekord do bazy danych');
        </script>
        ");
    }
    
    ?>
    </div>
    <div class="stopka3">
        Autor: Dawid Nikiel
    </div>

</body>
</html>