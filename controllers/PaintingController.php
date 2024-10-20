<?php
// controllers/PaintingController.php
include_once '../classes/Painting.php';
include_once '../includes/db_connect.php';

function getPaintings() {
    global $conn;
    $sql = "SELECT * FROM paintings";
    $result = $conn->query($sql);
    $paintings = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $painting = new Painting($row['id'], $row['title'], $row['artist'], $row['year'], $row['image']);
            array_push($paintings, $painting);
        }
    }
    return $paintings;
}
?>
