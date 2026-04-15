<?php
$connect = mysqli_connect("localhost", "root", "", "bazar");

if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
    header("Location: rejestracja.php?msg=puste");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["username"];
    $email = $_POST["email"];
    $haslo = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $avatar = $_POST["avatar"];


    $check = mysqli_query($connect, "SELECT * FROM uzytkownicy WHERE login='$login'");
    if (mysqli_num_rows($check) > 0) {
        header("Location: rejestracja.php?msg=zajety");
        exit();
    }

    $sql = "INSERT INTO uzytkownicy (id, login, haslo, email, avatar)
            VALUES ('', '$login', '$haslo', '$email', '$avatar')";

    if ($connect->query($sql) === TRUE) {
        header("Location: rejestracja.php?msg=ok.");
        exit();
    } else {
       header("Location: rejestracja.php?msg=blad");
       exit();
    }
}
?>