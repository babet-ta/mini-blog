<?php
class Post
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function addPost($title, $content)
  {
    $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss", $title, $content);
    return $stmt->execute();
  }

  public function getAllPosts()
  {
    $result = $this->conn->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getPost($id)
  {
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }
}
