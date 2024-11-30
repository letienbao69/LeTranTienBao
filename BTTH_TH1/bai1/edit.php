<?php
require 'db.php';

// Lấy dữ liệu hoa cần sửa
$id = $_GET['id'];
$sql = "SELECT * FROM flowers WHERE id = $id";
$result = $conn->query($sql);
$flower = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_path = $flower['image'];

    // Kiểm tra nếu có upload ảnh mới
    if (!empty($_FILES['image']['name'])) {
        $image_path = 'image/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }

    // Cập nhật dữ liệu
    $sql = "UPDATE flowers SET name='$name', description='$description', image='$image_path' WHERE id=$id";
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
    <title>Sửa thông tin hoa</title>
</head>
<body>
    <h1>Sửa thông tin hoa</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <label for="name">Tên Hoa:</label><br>
        <input type="text" name="name" value="<?php echo $flower['name']; ?>" required><br><br>
        <label for="description">Mô Tả:</label><br>
        <textarea name="description" required><?php echo $flower['description']; ?></textarea><br><br>
        <label for="image">Hình Ảnh (tùy chọn):</label><br>
        <input type="file" name="image" accept="image/*"><br><br>
        <button type="submit">Cập Nhật</button>
    </form>
</body>
</html>
