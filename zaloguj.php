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
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header class="header1">
        <h1><a href="index.php"><img src="szop.png" alt="Logo Szop"></a>Szop </h1>
 
    </header>

    <header class="header2">
        
</header>

    <main>
            <div class="bloczek">
                <h1>Zaloguj się</h1><br>
                <form action="zalogujKod.php" method="post">
                    <label for="username">Nazwa użytkownika:</label><br>
                    <input class="pola" type="text" id="username" name="username"><br>
                    <label for="password">Hasło:</label><br>
                    <input class="pola" type="password" id="password" name="password"><br><br>
                    <input class="submit" type="submit" value="Zaloguj się"><br><br>
                    
                </form>
                <?php
if (isset($_GET["msg"])) {
    if ($_GET["msg"] == "ok") {
        echo "<p class='komunikat'>Zalogowano!</p>";
    } elseif ($_GET["msg"] == "zlehaslo") {
        echo "<p class='komunikat'>Złe hasło! Spróbuj ponownie.</p>";
    } elseif ($_GET["msg"] == "brak") {
        echo "<p class='komunikat'>Nie ma takiego użytkownika!</p>";
    } elseif ($_GET["msg"] == "puste") {
        echo "<p class='komunikat'>Uzupełnij wszystkie pola!</p>";
    }
}
?>
                <h3>Nie masz konta? <a href="rejestracja.php">Zarejestruj się!</a></h3>
            </div>
        
    </main>

    <footer>
        
    </footer>

</body>
</html>

