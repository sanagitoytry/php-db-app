<?php
$dsn = 'mysql:dbname=cv0dkw1v74m7hwgw;host=ao9moanwus0rjiex.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;charset=utf8mb4';
$user = 'urxafjgy84fn480w';
$password = 'i754jm5pobydzxoa';

try {
  $pdo = new PDO($dsn, $user, $password);

  $sql_delete = 'DELETE FROM products WHERE id = :id';
  $stmt_delete = $pdo->prepare($sql_delete);

  $stmt_delete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt_delete->execute();

  $count = $stmt_delete->rowCount();
  $message = "商品を{$count}件削除しました。";

  header("location: read.php?message={$message}");
} catch(PDOException $e) {
  exit($e->getMessage());
}
?>