<?php
    require_once "header.php";
    global $pdo;

    if(!$loggedin) header('Location: index.php');

    if(isset($_GET['view'])) $view = sanitizeStr($_GET['view']);
    else $view = $user;

    if($view == $user){
        $name1 = $name2 = "Your";
        $name3 = "You are";
    }
    else{
        $name1 = "<a data-transition='slide' href='members.php?view=$view&r=$randstr'>$view</a>'s";
        $name2 = "$view's";
        $name3 = "$view is";
    }

    $followers = array(); $following = array();
    $stmt = $pdo->prepare("select * from friends where user=:view or friend=:friend");
    $stmt->bindValue(":view", $view);
    $stmt->bindValue(":friend", $view);
    $stmt->execute();
    
    $followerCount = 0; $followingCount = 0;
    while($row = $stmt->fetch()) {
        if($row['user'] == $view) $followers[$followerCount++] = $row['friend'];
        else $following[$followingCount++] = $row['user'];
    }
    $mutual = array_intersect($followers, $following);
    $followers = array_diff($followers, $mutual);
    $following = array_diff($following, $mutual);
    $haveFriends = $followerCount || $followingCount;

    $friendsArray = [$mutual, $followers, $following]; $namesArr = [$name2, $name2, $name3]; 
    $friendTypes = ['mutual friends', 'followers', 'following'];

    function showMyFriends($friendsArray, $namesArr, $friendTypes){
        global $randstr; global $haveFriends;
        if(!$haveFriends) echo "<br>You don't have any friends yet.";
        else{
            for($i = 0; $i < sizeof($friendsArray); $i++){
                echo "<span class='subhead'>$namesArr[$i] $friendTypes[$i]</span><ul>";
                foreach($friendsArray[$i] as $people) echo "<li><a data-transition='slide' 
                href='members.php?view=$people&r=$randstr'>$people</a>";
                echo "</ul>";
            }
        }
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
            showMyFriends($friendsArray, $namesArr, $friendTypes);
        ?>
        </div>
    </body>
</html>