<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "bazar");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["username"];
    $haslo = $_POST["password"];

    if (empty($login) || empty($haslo)) {
        header("Location: zaloguj.php?msg=puste");
        exit();
    }

    $sql = "SELECT * FROM uzytkownicy WHERE login='$login'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($haslo, $user["haslo"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["login"] = $user["login"];

            header("Location: index_zalogowany.php");
            exit();
        } else {
            header("Location: zaloguj.php?msg=zlehaslo");
            exit();
        }
    } else {
        header("Location: zaloguj.php?msg=brak");
        exit();
    }
}
?>