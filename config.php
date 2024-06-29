<?php

function loadEnv($path)
{
  if (!file_exists($path)) {
    throw new Exception(".env file not found");
  }

  $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach ($lines as $line) {
    if (strpos(trim($line), '#') === 0) {
      continue;
    }

    list($name, $value) = explode('=', $line, 2);
    $name = trim($name);
    $value = trim($value);

    if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
      putenv(sprintf('%s=%s', $name, $value));
      $_ENV[$name] = $value;
      $_SERVER[$name] = $value;
    }
  }
}

// Загрузка переменных из .env файла
loadEnv(__DIR__ . '/.env');

// Использование переменных окружения
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
define('DB_NAME', getenv('DB_NAME'));

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
