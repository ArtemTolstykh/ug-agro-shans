<?php

$servername = "localhost";
$dbname = "ugagro_test";
$username_db = "root";
$password_db = "b.5647382910-D";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$hectares = $_POST['hectares'];
$farm = $_POST['farmname'];


$stmt = $conn->prepare("INSERT INTO winners (fullname, phone, hectares, farmname) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssis", $fullname, $phone, $hectares, $farm); // s - строки, i - целое число

if ($stmt->execute()) {
    $winner_id = $conn->insert_id;

    $stmt_prize = $conn->prepare("SELECT id FROM prizes WHERE id NOT IN (SELECT prizes_id FROM itog) ORDER BY id ASC LIMIT 1");
    $stmt_prize->execute();
    $result = $stmt_prize->get_result();

    if ($row = $result->fetch_assoc()) {
        $prizes_id = $row['id'];

        $stmt_itog = $conn->prepare("INSERT INTO itog (prizes_id, winners_id) VALUES (?, ?)");
        $stmt_itog->bind_param("ii", $prizes_id, $winner_id);

        if ($stmt_itog->execute()) {
            echo "Prize and winner successfully linked in itog table!";
        } else {
            echo "Error inserting into itog table: " . $stmt_itog->error;
        }

        $stmt_itog->close();
    } else {
        echo "No available prizes without a winner.";
    }

    $stmt_prize->close();
} else {
    echo "Error inserting into winners table: " . $stmt->error;
}

if ($stmt->execute()) {
    echo "Data successfully inserted!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>