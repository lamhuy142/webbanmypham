<?php
//Lấy dữ liệu bài viết 

$sql = "SELECT * FROM news ORDER BY published_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Lặp qua từng bài viết
  while($row = $result->fetch_assoc()) {
    $news_id = $row["id"];
    $title = $row["title"];
    $content = $row["content"];
    $author = $row["author"];
    $published_date = $row["published_date"];

    // Hiển thị thông tin bài viết
    echo "<div class='news-item'>";
    echo "<h2>" . $title . "</h2>";
    echo "<p>" . $content . "</p>";
    echo "<p>Tác giả: " . $author . "</p>";
    echo "<p>Ngày đăng: " . $published_date . "</p>";
    echo "</div>";
  }
} else {
  echo "Không có bài viết nào được tìm thấy.";
}
?>