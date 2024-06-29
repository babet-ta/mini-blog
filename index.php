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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <h1>Мини-блог</h1>
  </header>
  <div class="container">
    <a href="add_post.php" class="button">Добавить пост</a>
    <h2>Все посты:</h2>
    <?php foreach ($posts as $post) : ?>
      <a href="view_post.php?id=<?php echo $post['id']; ?>" class="post-link">
        <article class="post">
          <div class="post-header">
            <h2 class="post-title">
              <?php echo htmlspecialchars($post['title']); ?>
            </h2>
          </div>
          <div class="post-content">
            <?php echo substr(htmlspecialchars($post['content']), 0, 150) . '...'; ?>
          </div>
          <div class="post-meta">
            <?php echo date('d.m.Y H:i', strtotime($post['created_at'])); ?>
          </div>
        </article>
      </a>
    <?php endforeach; ?>
  </div>
</body>

</html>