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
        <h1><a href="index_zalogowany.php"><img src="szop.png" alt="Logo Szop"></a>Szop </h1>
 
    </header>

    <header class="header2">

</header>

    <main>
            <div class="bloczek">
                <h1>Zarejestruj się</h1><br>
                <form action="rejestracjaKod.php" method="post" enctype="multipart/form-data">
                    <label for="username">Nazwa użytkownika (musi być unikalna):</label><br>
                    <input class="pola" type="text" id="username" name="username"><br>

                    <label for="email">Twój email:</label><br>
                    <input class="pola" type="email" id="email" name="email"><br>

                    <label for="password">Hasło:</label><br>
                    <input class="pola" type="password" id="password" name="password"><br>

                    <label for="avatar">Avatar: (podaj adres URL )</label><br>
                    <input class="pola" type="text" id="avatar" name="avatar"><br>

                    <input class="submit" type="submit" value="Zarejestruj się"><br><br>
                    
                </form>
                <?php
                
                    if (isset($_GET["msg"])) {
                        if ($_GET["msg"] == "ok") {
                            echo "<p class='komunikat'>Rejestracja udana! Mozesz sie zalogować.</p>";
                        } elseif ($_GET["msg"] == "blad") {
                            echo "<p class='komunikat'>Wystąpił błąd!</p>";
                        } elseif ($_GET["msg"] == "zajety") {
                            echo "<p class='komunikat'>Login zajęty!</p>";
                        }
                        elseif ($_GET["msg"] == "puste") {
                            echo "<p class='komunikat'>Uzupełnij wszystkie pola!</p>";
                        }
                    }
                ?><a href='zaloguj.php'> Zaloguj się</a>
                
                
            </div>
        
    </main>

    <footer>
        
    </footer>

</body>
</html>

