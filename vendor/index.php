
<?php
// Bao gồm tệp db.php
global $conn;
include_once 'includes/db.php';

// Lấy tất cả các sách từ cơ sở dữ liệu
$books = getAllBooks($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Books</title>
</head>
<body>
<h1>List of Books</h1>
<div id="bookList">
    <ul>
        <?php
        // Hiển thị danh sách sách
        foreach ($books as $book) {
            // Kiểm tra nếu không có title hoặc author thì sẽ hiển thị "Unknown"
            $title = isset($book['title']) ? $book['title'] : 'Unknown Title';
            $author = isset($book['author']) ? $book['author'] : 'Unknown Author';

            echo "<li>" . $title . " by " . $author . "</li>";
        }
        ?>
    </ul>
</div>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();

?>
