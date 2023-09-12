<?php
    require_once "header.php";
    global $pdo;
    $viewProfile = false; $view = $name = '';
    
    if(!$loggedin) header("Location: index.php?r=$randstr");

    if(isset($_GET['view'])){
        $view = sanitizeStr($_GET['view']);
        if($view == $user) $name = "Your";
        else $name = "$view's";
        $viewProfile = true;
    }
    elseif(isset($_GET['add'])){
        $add = sanitizeStr($_GET['add']);
        $stmt = $pdo->prepare("select * from friends where user=:add and friend=:user");
        $stmt->bindValue(":add", $add);
        $stmt->bindValue(":user", $user);
        $stmt->execute();
        if(!$stmt->rowCount()){
            $stmt = $pdo->prepare("insert into friends values (:add, :user)");
            $stmt->bindValue(":add", $add);
            $stmt->bindValue(":user", $user);
            $stmt->execute();
        }
    }
    elseif(isset($_GET['remove'])){
        $remove = sanitizeStr($_GET['remove']);
        $stmt = $pdo->prepare("delete from friends where user=:remove and friend=:user");
        $stmt->bindValue(":remove", $remove);
        $stmt->bindValue(":user", $user);
        $stmt->execute();
    }

    function showMemberProfile(){
        global $name; global $view; global $randstr;
        echo "<h3>$name Profile</h3>";
        showProfile($view);
        echo "<a data-role='button' data-transition='slide' href='messages.php?view=$view&r=$randstr'>
        View $name messages</a>";
    }

    function showMemberList(){
        global $pdo; global $user; global $randstr;
        $stmt = $pdo->prepare("select user from members order by user");
        $stmt->execute();
        $stmtCompare = $pdo->prepare("select * from friends where user=:user and friend=:friend");
        echo "<h3 style='position: relative; left: 10px;'>Other Members</h3><ul>";
        while($row = $stmt->fetch()){
            if($row['user'] == $user) continue;
    
            echo "<li><a data-transition='slide' href='members.php?view=" . $row['user'] . "&r=$randstr'>"
            . $row['user'] . "</a>";
            $follow = "follow";
    
            $stmtCompare->bindValue(":user", $row['user']);
            $stmtCompare->bindValue(":friend", $user);
            $stmtCompare->execute();
            $myFollow = $stmtCompare->rowCount();
    
            $stmtCompare->bindValue(":user", $user);
            $stmtCompare->bindValue(":friend", $row['user']);
            $stmtCompare->execute();
            $myFan = $stmtCompare->rowCount();
    
            if($myFollow && $myFan) echo " &harr; is mutual friend";
            elseif($myFollow) echo " &larr; you are following";
            elseif($myFan) {
                echo " &rarr; is following you";
                $follow = 'recip';
            }
            if(!$myFollow) echo "[<a data-transition='slide' href='members.php?add=" . 
            $row['user'] . "&r=$randstr'>$follow</a>]";  
            else echo "[<a data-transition='slide' href='members.php?remove=" . 
            $row['user'] . "&r=$randstr'>drop</a>]";
        }
        echo "</ul>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php headSetting(); ?>
    </head>
    <body>
        <div data-role="page">
        <?php 
            bodySetting();
            if($viewProfile) showMemberProfile();
            else showMemberList();
        ?>
        </div>
    </body>
</html>