<?php 
  require_once 'login.php';

  try
  {
    $pdo = new PDO($attr, $user, $pass, $opts);
  }
  catch (PDOException $e)
  {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

  $query = "SELECT * FROM classic";
  $result = $pdo->query($query);

  // echo "<pre>";
  // print_r($result->fetch(PDO::FETCH_BOTH));
  // echo "</pre>";

  while($row = $result->fetch()){
    echo "Author: " . htmlspecialchars($row['author']) . '<br>';
    echo "Title: " . htmlspecialchars($row['title']) . '<br>';
    echo "Category: " . htmlspecialchars($row['category']) . '<br>';
    echo "Year: " . htmlspecialchars($row['year']) . '<br>';
    echo "ISBN: " . htmlspecialchars($row['isbn']) . '<br><br>';
  }
?>
