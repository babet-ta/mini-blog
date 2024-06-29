<?php
require_once 'config.php';
require_once 'Post.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $post = new Post($conn);
  if ($post->addPost($title, $content)) {
    header("Location: index.php");
    exit;
  } else {
    $error = "Ошибка при добавлении поста";
  }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавить пост</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <h1>Добавить пост</h1>
  </header>
  <div class="container">
    <?php if (isset($error)) : ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
      <label for="title">Заголовок:</label>
      <input type="text" id="title" name="title" required>

      <label for="content">Содержание:</label>
      <textarea id="content" name="content" required></textarea>

      <button type="submit">Добавить</button>
    </form>
    <a href="index.php" class="back-link">Вернуться к списку постов</a>
  </div>
</body>

</html>