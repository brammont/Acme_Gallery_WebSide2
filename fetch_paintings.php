<?php
require_once 'controllers/PaintingController.php';

$controller = new PaintingController();
$paintings = $controller->getAllPaintings();

header('Content-Type: application/json');
echo json_encode($paintings);
?>
