<?php
    require_once 'function.php';
    global $pdo;

    if(isset($_POST['user'])){
        $user = sanitizeStr($_POST['user']);
        $stmt = $pdo->prepare("select * from members where user=:user");
        $stmt->bindValue(":user", $user);
        $stmt->execute();
        if($stmt->rowCount())
            echo "<span class=\"taken\">&nbsp;&#x2718; The username '$user' is taken</span>";
        else echo "<span class=\"available\">&nbsp;&#x2714; The username '$user' is available</span>";
    }
?>
