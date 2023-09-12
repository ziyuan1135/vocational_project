<?php
    $host = 'localhost';
    $db = 'final_project';
    $user = 'root';
    $pass = 'root';
    $chars = 'utf8mb4';
    $attr = "mysql:host=$host; dbname=$db; charset=$chars";
    $opts = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    try{
        $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch(PDOException $e){
        echo $e->getMessage() . "<br><br>" . $e->getCode();
    }

    function createTable($name, $query){
        global $pdo;
        try{
            $pdo->query("create table if not exists $name($query)");
            echo "Table '$name' created or already exist.<br>";
        }
        catch(PDOException $e){
            echo $e->getMessage() . "<br><br>" . $e->getCode();
        }
    }

    function destroySession(){
        $_SESSION = array();
        if(session_id() != '' || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
    }

    function sanitizeStr($str){
        $str = trim($str);
        $str = strip_tags($str);
        $str = htmlentities($str);
        return stripslashes($str);
    }

    function showProfile($user){
        global $pdo;
        if(file_exists("$user.jpg"))
            echo "<img src='$user.jpg' style='float:left;'>";
        
        $stmt = $pdo->prepare("select * from profiles where user=:user");
        $stmt->bindValue(":user", $user);
        $stmt->execute();

        if($row = $stmt->fetch()){
            echo(stripslashes($row['text']) . "<br style='clear:left;'><br>");
            return;
        }
        echo "<p>Nothing to see here, yet</p><br>";
    }
?>
