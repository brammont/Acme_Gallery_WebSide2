<?php
require_once '../config/db_connect.php';

class PaintingController {
    public function getAllPaintings() {
        global $pdo;
        $query = $pdo->query('SELECT * FROM paintings');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
