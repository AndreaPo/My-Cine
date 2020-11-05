<?php  
$id = $_SESSION['id'];

$query = "SELECT COUNT(title) FROM  mycinefilm WHERE userid = :userid";


$param = [
    ':userid'=>$id,
];

$resultMax = eQuery($pdo, $query, $param, false);

$count = ""; 
foreach ($resultMax as $row) {
    $count = $row['COUNT(title)'];
}

$_SESSION['countfilm'] = $count;