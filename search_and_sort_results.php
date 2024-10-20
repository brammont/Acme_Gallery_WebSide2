<?php
// search_and_sort_results.php
include_once 'controllers/PaintingController.php';
$paintings = getPaintings();

foreach ($paintings as $painting) {
    echo "<div>";
    echo "<h3>" . $painting->title . " by " . $painting->artist . " (" . $painting->year . ")</h3>";
    echo "<img src='uploads/" . $painting->image . "' alt='" . $painting->title . "' />";
    echo "</div>";
}
?>
