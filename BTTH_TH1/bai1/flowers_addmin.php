<?php
require 'db.php'; // Kết nối cơ sở dữ liệu

// Lấy danh sách hoa
$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị danh sách hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        h1 {
            text-align: center;
            margin: 20px;
        }
        .action-buttons a {
            margin-right: 10px;
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .add-button {
            background-color: #4CAF50;
            display: block;
            width: fit-content;
            margin: 10px auto;
            text-align: center;
        }
        .edit-button {
            background-color: #2196F3;
        }
        .delete-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Quản trị danh sách hoa</h1>
    <a href="add.php" class="add-button">Thêm hoa mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td><img src='{$row['image']}' alt='{$row['name']}' width='100'></td>
                        <td class='action-buttons'>
                            <a href='edit.php?id={$row['id']}' class='edit-button'>Sửa</a>
                            <a href='delete.php?id={$row['id']}' class='delete-button' onclick=\"return confirm('Bạn có chắc muốn xóa?');\">Xóa</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Chưa có loài hoa nào trong danh sách.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
