<?php
    require_once "header.php";
    global $pdo;
    $num = 0;

    if(!$loggedin) header("Location: index.php");

    if(isset($_GET['view'])) $view = sanitizeStr($_GET['view']);
    else $view = $user;

    if(isset($_POST['text'])){
        $text = sanitizeStr($_POST['text']);
        if($text != ''){
            $pm = substr(sanitizeStr($_POST['pm']), 0, 1);
            $datetime = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare("insert into messages values(NULL, :user, :view, :pm, :time, :text)");
            $stmt->bindValue(":user", $user);
            $stmt->bindValue(":view", $view);
            $stmt->bindValue(":pm", $pm);
            $stmt->bindValue(":time", $time);
            $stmt->bindValue(":text", $text);
            $stmt->execute();
        }
    }

    if($view != ""){
        if($view == $user) $name1 = $name2 = "Your";
        else{
            $name1 = "<a href='members.php?view=$view&r=$randstr>$view</a>'s";
            $name2 = "$view's";
        }

        if(isset($_GET['erase'])){
            $erase = sanitizeStr($_GET['erase']);
            $stmt = $pdo->prepare("delelte from messages where id=:erase and recip=:user");
            $stmt->bindValue(":erase", $erase);
            $stmt->bindValue(":user", $user);
            $stmt->execute();
        }
    }

    function messageFormSetting(){
        global $name1; global $view; global $randstr;
        echo " <h3>$name1 Messages</h3>";
        showProfile($view);
        echo <<<_end
        <form method="post" action="messages.php?view=$view&r=$randstr">
            <fieldset data-role="controlgroup" data-type="horizontal">
                <legend>Type here to leave a message</legend>
                <input type="radio" name="pm" id="public" value="0" checked='checked'>
                <label for="public">Public</label>
                <input type="radio" name="pm" id="private" value="1">
                <label for="private">Private</label>
            </fieldset>
            <textarea name="text"></textarea>
            <input data-transition='slide' type="submit" value="Post Message">
        </form><br>
        _end;
    }

    function showMessage(){
        global $pdo; global $view; global $user; global $randstr; global $num;
        $stmt = $pdo->prepare("select * from messages where recip=:view order by time desc");
        $stmt->bindValue(":view", $view);
        $stmt->execute();
        $num = $stmt->rowCount();
        while($row = $stmt->fetch()){
            if($row['pm'] == 0 || $row['auth'] == $user || $row['recip'] == $user){
                echo $row['time'];
                echo " <a href='messages.php?view=" . $row['auth'] . "&r=$randstr'>"
                . $row['auth'] . "</a>";
                if($row['pm'] == 0) echo "wrote: &quote;" . $row['message'] . "&quot; ";
                else echo "whispered: <span class='whisper'>&quote;" . $row['message'] . "&quot;</span>";
                if($row['recip'] == $user) echo "[<a href='messages.php?view=$view" . "&erase=" 
                . $row['id'] . "&r=$randstr>erase</a>]";
                echo "<br>";
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
            if($view != ""){
                messageFormSetting();
                showMessage();
            }
            if(!$num) echo "<br><span class='info'>No message yet</span><br><br>";
            echo "<br><a data-role='button' href='messages.php?view=$view&r=$randstr'>Refresh messages</a>";
        ?>
        </div>
    </body>
</html>