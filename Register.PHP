<?php
include 'Dtb_Connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu

    // Thêm dữ liệu vào bảng
    $sql = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Đăng ký thành công! Chào mừng $fullname');</script>";
    } else {
        echo "<script>alert('Lỗi: " . $conn->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff9a9e, #fad0c4);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            width: 400px;
        }
        .register-container h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #ff5e78;
        }
        .register-container form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .register-container input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }
        .register-container button {
            background: #ff5e78;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        .register-container button:hover {
            background: #e04d64;
        }
        .cosmetics {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .cosmetics img {
            width: 50px;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Đăng Ký</h1>
        <form action="" method="post">
            <input type="text" name="fullname" placeholder="Họ và Tên" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng Ký</button>
      
    </div>
</body>
</html>
