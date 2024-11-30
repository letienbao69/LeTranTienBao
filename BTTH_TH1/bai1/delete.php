<?php
require 'db.php';

$id = $_GET['id'];

// Xóa dữ liệu
$sql = "DELETE FROM flowers WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header('Location: flowers_addmin.php');
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}
?>
