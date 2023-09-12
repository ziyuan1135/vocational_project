<?php
    require_once 'login.php';
    try
    {
      $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch (PDOException $e)
    {
      echo $e->getMessage() . '<br>' . $e->getCode() . '<br>';
    }

    $query = "CREATE TABLE user(
      id INT AUTO_INCREMENT PRIMARY KEY,
      account VARCHAR(20) NOT NULL,
      password VARCHAR(20) NOT NULL,
      name VARCHAR(20) NOT NULL,
      unit VARCHAR(15) NOT NULL,
      phone char(10) NOT NULL,
      email VARCHAR(30) NOT NULL,
      create_date DATETIME NOT NULL,
      admin_id INT NOT NULL,
      FOREIGN KEY (admin_id) REFERENCES admin(id)
  ) ENGINE INNODB";

    $result = $pdo->query($query);
?>