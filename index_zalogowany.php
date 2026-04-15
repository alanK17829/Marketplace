<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "bazar");
if (!isset($_SESSION["user_id"])) {
    header("Location: zaloguj.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header class="header1">
        <h1><a href="index_zalogowany.php"><img src="szop.png" alt="Logo Szop"></a>Szop </h1>
 
    </header>

    <header class="header2">
        <h2>Witaj, <?php 
        $sql = "SELECT login, avatar FROM uzytkownicy WHERE id=" . $_SESSION["user_id"];
        $result = $connect->query($sql);
        while($row = mysqli_fetch_row($result)) {
            echo $_SESSION["login"]. "! "; 
            echo "<img src='" . $row[1] . "' alt='Avatar użytkownika' class='avatar'>";
            echo "<a href='wyloguj.php' class='logout'>Wyloguj się</a>";
        }
        ?>

    </h2>
    
        
    </header>

    <aside>
        <div class="a1" onclick="showPage('Pokaz')">
            <h2>Pokaz produkty</h2>
        </div>
        <div class="a2" onclick="showPage('Dodaj')">
            <h2>Dodaj produkt</h2>
        </div>
        <div class="a3" onclick="showPage('Użytkownicy')">
            <h2>Użytkownicy</h2>
        </div>
    </aside>


    <main>
            <div id="Pokaz" class="blokimain">
                <h2>Produkty</h2>
                <?php
                $query = "SELECT * FROM produkty";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_row($result)) {
                    echo "<div class='produkt'><br>";
                    echo "<img src='" . $row[7] . "' alt='Zdjęcie produktu'><br>";
                    echo "<p> Nazwa produktu: </p>" . $row[1] . "<br><br>";
                    echo "<p> Opis produktu: </p>" . $row[2] . "<br><br>";
                    echo "<p> Cena produktu: </p>" . $row[3] . " zł<br><br>";
                    echo "<p> Status produktu: </p>" . $row[4] . "<br><br>";
                    echo "</div>";
                }
                ?>
            </div>
    
            <div id="Dodaj" class="blokimain" style="display:none;">
                <h2>Dodaj swój produkt</h2><br><br><br>
                <form action="index_zalogowany.php" method="post" enctype="multipart/form-data">
                    <label for="nazwa">Nazwa produktu:</label><br>
                    <input class="pola" type="text" id="nazwa" name="nazwa"><br>

                    <label for="opis">Opis produktu:</label><br>
                    <textarea class="pola" id="opis" name="opis"></textarea><br>

                    <label for="cena">Cena produktu:</label><br>
                    <input class="pola" type="number" id="cena" name="cena" step="0.01"><br>

                    <label for="zdjecie">Zdjęcie produktu: (Adres URL zdjęcia)</label><br>
                    <input class="pola" type="text" id="zdjecie" name="zdjecie"><br>

                    <label for="status">Status produktu:</label><br>
                    <select class="pola" id="status" name="status">
                        <option value="dostępny">Dostępny</option>
                        <option value="niedostępny">Niedostępny</option>
                    </select><br><br>


                    <input class="submit" type="submit" value="Dodaj produkt">
                </form>

                <?php  
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nazwa = $_POST["nazwa"];
                    $opis = $_POST["opis"];
                    $cena = $_POST["cena"];
                    $zdjecie = $_POST["zdjecie"];
                    $status = $_POST["status"];

                    $sql = "INSERT INTO produkty VALUES (null, '$nazwa', '$opis', '$cena' ,'$status','" . $_SESSION['user_id'] . "',NOW(),'$zdjecie')";

                    if ($connect->query($sql) === TRUE) {

                    header("Location: index_zalogowany.php?dodano=1");
                    exit();
                    } 
                    else {
                        echo "Błąd: " . $sql . "<br>" . $connect->error;
                    }
                    if (isset($_GET["dodano"])) {
                        echo "Produkt dodany pomyślnie!";
                    }
                }
                ?>
            </div>
    
            <div id="Użytkownicy" class="blokimain" style="display:none;">
                <h2>Zarejestrowani Użytkownicy</h2><br><br><br>
                <?php
                $query = "SELECT * FROM uzytkownicy";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_row($result)) {
                    echo "<div class='uzytkownik'><br>";
                    echo "<img src='". $row[4] . "' alt='Zdjęcie użytkownika'><br>";
                    echo "<p class='paragraf3'> Nazwa użytkownika: </p>" . $row[1] . "<br>";
                    echo "<p class='paragraf3'> Email: </p>" . $row[3] . "<br>";
                    echo "</div>";
                }
                ?>
                
            </div>
        
    </main>

    <footer>
        
    </footer>

    <script>
function showPage(id) {
  const pages = document.querySelectorAll(".blokimain");

  pages.forEach(p => {
    p.style.display = "none";
  });

  document.getElementById(id).style.display = "block";
}

</script>
</body>
</html>

