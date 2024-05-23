<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Расписание экзаменов</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$selectedDate = $_GET['date'];

require_once 'db.php';

$schedule = getSchedule($selectedDate);
?>
<div class="container-sm">
<?php echo "<h1>".$selectedDate."</h1>";?>
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">Время экзамена</th>
      <th scope="col">Название предмета</th>
      <th scope="col">Список специальностей, абитуриенты которых должны прийти на экзамен</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach ($schedule as $row) {
       $examTime=date('H:i', strtotime($row['date']));
       $subject=getSubject($row['id_subject']);
       $specialities=getSpecialities($row['id_subject']);
       $listOfSpecialities = "";
       foreach ($specialities as $row2) {
           $listOfSpecialities = $listOfSpecialities.$row2['title'].", ";
       }
       echo "<tr><td>".$examTime."</td><td>".$subject[0]['title']."</td><td>".substr($listOfSpecialities, 0, -2).".</td></tr>";
  }
  ?>
  </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>