<?php
require 'db.php'; // Kết nối tới database

// Truy vấn lấy danh sách hoa
$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa xuân hè</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .flower {
            display: flex;
            align-items: center;
            background: #fff;
            margin: 15px 0;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .flower img {
            max-width: 150px;
            border-radius: 8px;
            margin-right: 20px;
        }
        .flower h2 {
            margin: 0;
            color: #333;
        }
        .flower p {
            margin: 10px 0 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center; color: #4CAF50;">Danh sách các loài hoa đẹp</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='flower'>
                    <img src='{$row['image']}' alt='{$row['name']}'>
                    <div>
                        <h2>{$row['name']}</h2>
                        <p>{$row['description']}</p>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<p>Không có loài hoa nào trong danh sách.</p>";
        }
        ?>
    </div>
</body>
</html>
