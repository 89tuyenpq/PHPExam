<?php


$servername = "localhost";
$username = "root";
$password = "admin@123";
$dbname = "t2303e_db";

/// Tạo kết nối
global $conn;
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hàm để lấy tất cả các sách từ cơ sở dữ liệu
function getAllBooks($conn)
{
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
    $books = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
    }
    return $books;
}

