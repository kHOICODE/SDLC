<?php
session_start(); // Bắt đầu phiên làm việc
include 'Dtb_Connect.php'; // Kết nối database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra tài khoản trong database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql); // Sử dụng prepared statements để tránh SQL injection
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Kiểm tra mật khẩu
        if (password_verify($password, $row['password'])) {
            // Lưu thông tin vào session
            $_SESSION['username'] = $username;
            header("Location: home.php"); // Chuyển hướng tới trang chủ
            exit;
        } else {
            echo "<script>alert('Sai mật khẩu!');</script>";
        }
    } else {
        echo "<script>alert('Tên đăng nhập không tồn tại!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #fbc2eb, #a6c1ee);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }

        .login-container h1 {
            color: #d23669;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #d23669;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .login-container button:hover {
            background-color: #bf1d57;
        }

        .cosmetic-images {
            position: absolute;
            z-index: -1;
        }

        .cosmetic-images img {
            position: absolute;
            max-width: 100px;
            opacity: 0.8;
            animation: float 6s ease-in-out infinite;
        }

        .cosmetic-images img:nth-child(1) {
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .cosmetic-images img:nth-child(2) {
            top: 30%;
            right: 10%;
            animation-delay: 1s;
        }

        .cosmetic-images img:nth-child(3) {
            bottom: 20%;
            left: 10%;
            animation-delay: 2s;
        }

        .cosmetic-images img:nth-child(4) {
            bottom: 5%;
            right: 15%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>
<body>
    <div class="cosmetic-images">
        <img src="lipstick.png" alt="Son môi">
        <img src="perfume.png" alt="Nước hoa">
        <img src="foundation.png" alt="Kem nền">
        <img src="eyeshadow.png" alt="Phấn mắt">
    </div>

    <div class="login-container">
        <h1>Đăng Nhập</h1>
        <form action="Login.php" method="post">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>
</html>


# SDLC
