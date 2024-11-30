<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_path = 'images/' . $_FILES['image']['name'];

    // Upload file ảnh
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

    // Thêm dữ liệu vào database
    $sql = "INSERT INTO flowers(name, description, image) VALUES ('$name', '$description', '$image_path')";
    if ($conn->query($sql) === TRUE) {
        header('Location: flowers_addmin.php');
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hoa mới</title>
</head>
<body>
    <h1>Thêm hoa mới</h1>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <label for="name">Tên Hoa:</label><br>
        <input type="text" name="name" required><br><br>
        <label for="description">Mô Tả:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label for="image">Hình Ảnh:</label><br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <button type="submit">Thêm Hoa</button>
    </form>
</body>
</html>
