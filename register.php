<?php
// Thông tin kết nối cơ sở dữ liệu
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

// Xử lý form đăng ký khi submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $email = $_POST["email"];

    // Thực hiện truy vấn SQL để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO user_info VALUES ('$username', '$password1', '$email');";



    if ($conn -> query($sql) === TRUE) {
        echo "Đăng ký thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
