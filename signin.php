<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "shop_game_account";

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Truy vấn SQL để lấy thông tin từ bảng user_info
    $sql = "SELECT username, password FROM user_info";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        // Lặp qua kết quả truy vấn
        while ($row = $result->fetch_assoc()) {
            $storedUsername = $row["username"];
            $storedPassword = $row["password"];

            // So sánh thông tin đăng nhập với dữ liệu từ bảng user_info
            if ($username == $storedUsername && $password == $storedPassword) {
                // Đăng nhập thành công
                echo "Đăng nhập thành công!";
                // Thực hiện các hành động sau khi đăng nhập thành công
                break;
            }
        }

        // Nếu không có kết quả trùng khớp, đăng nhập thất bại
        echo "Tên đăng nhập hoặc mật khẩu không đúng!";
    } else {
        echo "Không có dữ liệu.";
    }
}

// Đóng kết nối
$conn->close();
?>