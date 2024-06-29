<?php
require_once 'config.php';
require_once 'Post.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$post = new Post($conn);
$post_data = $post->getPost($_GET['id']);

if (!$post_data) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($post_data['title']); ?></title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1><?php echo htmlspecialchars($post_data['title']); ?></h1>
  <p><?php echo nl2br(htmlspecialchars($post_data['content'])); ?></p>
  <p>Дата создания: <?php echo $post_data['created_at']; ?></p>
  <a href="index.php">Вернуться к списку постов</a>
</body>

</html>