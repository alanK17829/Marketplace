<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "bazar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <header class="header1">
        <h1><a href="index_zalogowany.php"><img src="szop.png" alt="Logo Szop"></a>Szop </h1>
 
    </header>

    <header class="header2">
        <h2><a href="zaloguj.php">Zaloguj się</a></h2>
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
                <p class="paragraf1">Widze że jesteś nie zalogowany.</p><br>
                <p class="paragraf1">Kliknij w przycisk "Zaloguj się" aby móc dodać produkt.</p><br>
                <h3><a href="zaloguj.php">Zaloguj się</a></h3>
            </div>
    
            <div id="Użytkownicy" class="blokimain" style="display:none;">
                <h2>Strona Użytkownicy</h2><br><br><br>
                <p class="paragraf2">Żeby zobaczyć listę użytkowników, zaloguj się.</p><br>
                <h3><a href="zaloguj.php">Zaloguj się</a></h3>
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

