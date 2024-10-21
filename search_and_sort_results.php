<?php
// search_and_sort_results.php
require_once 'includes/db_connect.php';
require_once 'controllers/PaintingController.php';

$controller = new PaintingController($conn);

// Get search and sort parameters from the frontend
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'title';

// Query for paintings based on search and sort
$sql = "SELECT * FROM paintings WHERE title LIKE '%$search%' OR artist LIKE '%$search%' ORDER BY $sort_by";
$result = $conn->query($sql);

$paintings = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $paintings[] = $row;
    }
}

// Return the JSON data to the frontend
header('Content-Type: application/json');
echo json_encode($paintings);
?>
