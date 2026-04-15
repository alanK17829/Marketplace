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
        <h1>Szop<img src="szop.png" alt="Logo Szop"></h1>
 
    </header>

    <header class="header2">
        <h2>Zaloguj się</h2>
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
                $connect = mysqli_connect("localhost", "root", "", "bazar");
                $query = "SELECT * FROM produkty";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_row($result)) {
                    echo "<div class='produkt'><br>";
                    echo "<img src='" . $row[7] . "' alt='Zdjęcie produktu'><br>";
                    echo "<p> Nazwa produktu: " . $row[1] . "</p><br>";
                    echo "<p> Opis produktu: " . $row[2] . "</p><br>";
                    echo "<p> Cena produktu: " . $row[3] . " zł</p><br>";
                    echo "</div>";
                }
                ?>
            </div>
    
            <div id="Dodaj" class="blokimain" style="display:none;">
                <h2>Strona Dodaj</h2>
                <p>Tu będzie formularz dodawania produktu.</p>
            </div>
    
            <div id="Użytkownicy" class="blokimain" style="display:none;">
                <h2>Strona Użytkownicy</h2>
                <p>Tu będzie lista użytkowników.</p>
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

