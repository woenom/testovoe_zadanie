<?php 
require_once 'db.php';

try {
$conn = connectToDatabase();

$subject = $_POST["subject"];
$datetime = $_POST["datetime"];
$datetime = date('Y-m-d H:i:s', strtotime($datetime)); 

    $sql = "INSERT INTO schedule (id_subject,date) VALUES (:subject,:datetime)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':datetime', $datetime);

    $stmt->execute();

    echo "Данные успешно добавлены в базу данных!";
    $conn = null;
    $datetime = date('Y-m-d', strtotime($datetime)); 
    header('Location: http://smartwatch.000.pe/subjects-data.php?date='.$datetime);

} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
    $conn = null;
}

?>