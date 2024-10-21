<?php
// controllers/PaintingController.php
require_once '../includes/db_connect.php';
require_once '../classes/Painting.php';

class PaintingController {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all paintings
    public function getAllPaintings() {
        $sql = "SELECT * FROM paintings";
        $result = $this->conn->query($sql);

        $paintings = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $painting = new Painting($row['id'], $row['title'], $row['artist'], $row['year'], $row['image']);
                array_push($paintings, $painting);
            }
        }
        return $paintings;
    }

    // Add painting
    public function addPainting($title, $artist, $year, $image) {
        $sql = "INSERT INTO paintings (title, artist, year, image) VALUES ('$title', '$artist', '$year', '$image')";
        if ($this->conn->query($sql) === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    // Update painting
    public function updatePainting($id, $title, $artist, $year, $image) {
        $sql = "UPDATE paintings SET title='$title', artist='$artist', year='$year', image='$image' WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return "Record updated successfully";
        } else {
            return "Error updating record: " . $this->conn->error;
        }
    }

    // Delete painting
    public function deletePainting($id) {
        $sql = "DELETE FROM paintings WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $this->conn->error;
        }
    }
}
?>
