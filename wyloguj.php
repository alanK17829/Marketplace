<?php
session_start();
session_destroy();

echo "Wylogowano!";

header("Location: index.php?msg=brak");
exit();
?>