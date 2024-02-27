
<?php
// Bao gồm tệp db.php để kết nối đến cơ sở dữ liệu
include_once 'includes/db.php';

// Khởi tạo biến $searchTerm là chuỗi rỗng
$searchTerm = "";

// Kiểm tra xem biến $_POST['searchTerm'] có tồn tại không
if (isset($_POST['search'])) {
    // Lấy từ khóa tìm kiếm từ biểu mẫu và gán vào biến $searchTerm
    $searchTerm = $_POST['searchTerm'];

    // Truy vấn cơ sở dữ liệu để tìm sách có tiêu đề chứa từ khóa tìm kiếm
    $sql = "SELECT * FROM books WHERE title LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Kiểm tra xem có kết quả trả về không
    if ($result->num_rows > 0) {
        // Duyệt qua các hàng kết quả và hiển thị thông tin của sách
        while ($row = $result->fetch_assoc()) {
            echo "Book ID: " . $row["bookid"] . " - Title: " . $row["title"] . " - ISBN: " . $row["ISBN"] . "<br>";
        }
    } else {
        // Hiển thị thông báo nếu không tìm thấy kết quả
        echo "No results found";
    }
}
?>

<!-- Form tìm kiếm sách -->
<form class="search-form" method="POST" action="">
    <input type="text" name="searchTerm" value="<?php echo $searchTerm; ?>" placeholder="Enter search term...">
    <input type="submit" name="search" value="Search">
</form>
