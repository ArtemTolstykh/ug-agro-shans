<?php
/*$server = 'localhost';
$username = 'root';
$password = 'b.5647382910-D';
$dbname = 'ugagro_test';
$dbtable = 'winners';

try {
    $db = new PDO('mysql:host=localhost;dbname=ugagro_test', 'root', 'b.5647382910-D');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}



//$conn = new mysqli($server, $username, $password, $dbname);
//$conn->set_charset("utf8");
//if ($conn->connect_error){
//    throw new Exception("Ошибка подключения к базе данных");
//}
//else {
//    echo "ПОдключено!";
//}
*/


// Подключение к базе данных

// Подключаемся к базе данных
$servername = "localhost";
$username = "root"; // замените на имя пользователя базы данных
$password = "b.5647382910-D"; // замените на пароль базы данных
$dbname = "ugagro_test";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из формы
$fullname = @$_POST['fullname'];
$phone = @$_POST['phone'];
$hectares = @$_POST['hectares'];
$farmname = @$_POST['farmname'];

// Пишем SQL запрос на вставку данных в таблицу winners
$sql = "INSERT INTO winners (fullname, phone, hectares, farmname) 
        VALUES ('$fullname', '$phone', '$hectares', '$farmname')";


// Закрываем соединение
$conn->close();
?>





