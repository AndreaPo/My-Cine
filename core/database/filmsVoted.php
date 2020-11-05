<?php  
$id = $_SESSION['id'];

$query = "SELECT * FROM  mycinefilm WHERE userid = :userid";


$param = [
    ':userid'=>$id,
];

$resultMax = eQuery($pdo, $query, $param, false);

$votedFilms = [];

foreach ($resultMax as $row) {

    echo "<tr><td><h3>" . $row['title']. "</h3></td></tr>";
}
