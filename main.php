<?php

$dsn = "sqlite:db/expstatistics.sqlite";
$db = new PDO($dsn);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM users";
$stmt = $db->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_BOTH);
list($id, $username, $position, $email, $password) = $res[0];

//echo "<pre>", print_r($res, true), "</pre>";

$sql = "SELECT * FROM staffing";
$stmt = $db->prepare($sql);
$stmt->execute();

$resstaff = $stmt->fetchAll(PDO::FETCH_BOTH);
for ($i = 0; $i < 2; $i++) {
    list($id, $staff, $date) = $resstaff[$i];
    echo "<pre>", "ID: ", $id, "<br>Staffed by: ", $res[$staff]["name"], "<br>Date: ", $date, "</pre>";
}
 ?>
