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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <h1><?php echo htmlspecialchars($post_data['title']); ?></h1>
  </header>
  <div class="container">
    <article class="post">
      <div class="post-content">
        <?php echo nl2br(htmlspecialchars($post_data['content'])); ?>
      </div>
      <div class="post-meta">
        Дата создания: <?php echo date('d.m.Y H:i', strtotime($post_data['created_at'])); ?>
      </div>
    </article>
    <a href="index.php" class="back-link">Вернуться к списку постов</a>
  </div>
</body>

</html>