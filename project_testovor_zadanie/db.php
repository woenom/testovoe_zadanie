<?php

function connectToDatabase() {
    $servername = "sql311.infinityfree.com";
    $username = "if0_36580558";
    $password = "3i4ifUp8tUeolGm";
    $dbname = "if0_36580558_wp";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $huruf= $conn->query("SET NAMES 'utf8'");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
}

function getSubjects() {
    $conn = connectToDatabase();
    $sql = "SELECT `title` FROM subjects";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $subjects;
}
function getSchedule($selectedDate) {
    $conn = connectToDatabase();
    $beginDate = date('Y-m-d H:i:s', strtotime($selectedDate));
    $endDate = new DateTime($beginDate);
    $endDate = date('Y-m-d H:i:s', strtotime($selectedDate.' +1 day -1 second'));
    $sql = "SELECT * FROM schedule WHERE date >= '" . addslashes($beginDate) . "' AND date <= '" . addslashes($endDate) . "'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $schedule;
}
function getSubject($id_subject){
    $conn = connectToDatabase();
    $sql = "SELECT `title` FROM subjects WHERE id = ".addslashes($id_subject)."";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $subject = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $subject;
}
function getSpecialities($id_subject){
    $conn = connectToDatabase();
    $sql = "SELECT `title` FROM specialities WHERE id IN (SELECT `id_speciality` FROM subjects_to_specialities WHERE id_subject = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_subject]); 
    $specialities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $specialities;
}