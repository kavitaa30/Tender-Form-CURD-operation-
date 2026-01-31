<?php
include "config/db.php";

$id = $_GET['id'];

$query = "DELETE FROM tenders WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: list.php");
} else {
    echo "Delete failed";
}
?>
