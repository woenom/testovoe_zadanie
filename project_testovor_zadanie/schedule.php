<?php
require_once 'db.php';

$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

// Добавление нового экзамена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $subjectId = $_POST['subject'];

    // Вставка записи в таблицу schedule
    $sql = "INSERT INTO schedule (id_subject, date) VALUES (:id_subject, :date)";
    $stmt = connectToDatabase()->prepare($sql);
    $stmt->bindParam(':id_subject', $subjectId);
    $stmt->bindParam(':date', $date);
    $stmt->execute();

    // Перенаправление на страницу расписания
    header('Location: schedule.php?date=' . $date);
    exit;
}

$sql = "SELECT s.title AS subject_title, DATE_FORMAT(sch.date, '%Y-%m-%d') AS schedule_date 
        FROM schedule sch
        JOIN subjects s ON sch.id_subject = s.id
        WHERE sch.date = :date";

$stmt = connectToDatabase()->prepare($sql);
$stmt->bindParam(':date', $date);
$stmt->execute();
$schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Расписание экзаменов</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1 class="text-center mt-4">Расписание на <?php echo date('d.m.Y', strtotime($date)); ?></h1>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>Предмет</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedule as $item) { ?>
                <tr>
                    <td><?php echo $item['subject_title']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>