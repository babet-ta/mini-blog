<?php
require_once 'config.php';
require_once 'Post.php';

$post = new Post($conn);
$posts = $post->getAllPosts();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Мини-блог</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Мини-блог</h1>
  <a href="add_post.php">Добавить пост</a>
  <h2>Список постов:</h2>
  <ul>
    <?php foreach ($posts as $post) : ?>
      <li>
        <a href="view_post.php?id=<?php echo $post['id']; ?>">
          <?php echo htmlspecialchars($post['title']); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>