<?php
// Подключаемся к базе данных
$servername = "localhost"; // Адрес сервера
$dbname = "test"; // Имя вашей базы данных
$username_db = "root"; // Имя пользователя базы данных
$password_db = "b.5647382910-D"; // Пароль пользователя базы данных

// Создаем подключение
$conn = new mysqli($servername, $username_db, $password_db, $dbname);




$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$hectares = $_POST['hectares'];
$farm = $_POST['farmname'];

$sql = "INSERT INTO users (username, phone, hectares, farm_name) VALUES ('$fullname', '$phone', '$hectares', '$farm')";








ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn->close();

?>
