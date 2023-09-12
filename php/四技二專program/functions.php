<?php
    $host = 'localhost';
    $user = 'tester';
    $pass = 'password';
    $db = '四技二專';
    $chars = 'utf8mb4';
    $attrs = "mysql:host=$host; dbname=$db; charset=$chars";
    $opts = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    try{
        $pdo = new PDO($attrs, $user, $pass, $opts);
    }
    catch(PDOException $e){
        echo $e->getMessage() . "<br><br>" . $e->getCode();
    }

    function createTable($tableName, $query){
        global $pdo;
        try{
            $pdo->query("create table if not exists $tableName($query)");
        }
        catch(PDOException $e){
            echo $e->getMessage() . "<br><br>" . $e->getCode();
        }
    }

    function sanitizeStr($str){
        $str = trim($str);
        $str = strip_tags($str);
        $str = htmlentities($str);
        return stripslashes($str);
    }
?>