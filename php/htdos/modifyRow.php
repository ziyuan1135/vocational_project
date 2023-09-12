<?php
    require_once 'login.php';
    session_start();
    $table = $_SESSION['targetTable'];
    $id = $_SESSION['targetID'];
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_SESSION);
    // echo "target table: ". $_SESSION['targetTable'] . "<br>";
    // echo "</pre>";

    if($_POST['cancel']){
        header("location:acc_mana_interface.php");
        exit();
    }
    if($_POST['upload']){
        try{
            $pdo = new PDO($attr, $user, $pass, $opts);
            $stmt = $pdo->prepare("UPDATE $table SET account=:account, password=:pass, name=:name, unit=:unit, email=:email, phone=:phone WHERE id=$id");
            $stmt->bindValue(":account", $_POST['account']);
            $stmt->bindValue(":pass", $_POST['pass']);
            $stmt->bindValue(":name", $_POST['name']);
            $stmt->bindValue(":unit", $_POST['unit']);
            $stmt->bindValue(":phone", $_POST['phone']);
            $stmt->bindValue(":email", $_POST['email']);
            $stmt->execute();
            header("location:acc_mana_interface.php");
            exit();
        }
        catch(PDOException $e){
            echo $e->getMessage() . "<br>" . $e->getCode() . "<br>";
        }
    }

    try{
        $pdo = new PDO($attr, $user, $pass, $opts);
        $stmt = $pdo->query("SELECT * FROM $table WHERE id=$id");
        $arr = $stmt->fetch();
        $account = htmlentities($arr['account']); $password = htmlentities($arr['password']); $name = htmlentities($arr['name']);
        $unit = htmlentities($arr['unit']); $phone = htmlentities($arr['phone']); $email = htmlentities($arr['email']);
        echo <<<_END
        <form method="post" action="modifyRow.php">
        <span style="font-size:15px">
        <pre>
           帳號: <input type='text' name='account' style='font-size:15px' required pattern=[0-9A-za-z]+ maxlength='20' placeholder=只能輸入數字與英文字母 value=$account>
           密碼: <input type='text' name='pass' style='font-size:15px' required pattern=[0-9A-za-z]+ minlength=\"$pass_min_len\" maxlength='20' placeholder=至少8碼 value=$password>
           名字: <input type='text' name='name' style='font-size:15px' required maxlength='20' value=$name>
           單位: <input type='text' name='unit' style='font-size:15px' required maxlength='20' value=$unit>
           手機: <input type='text' name='phone' style='font-size:15px' required pattern=09[0-9]{8} placeholder=共10碼 maxlength='10' value=$phone>
          email: <input type='email' name='email' style='font-size:15px' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' maxlength='25' size='27' value=$email>
        <input type="submit" name='upload' value="送出"> </pre> </form>
        <form method="post" action="modifyRow.php">
        <input type="submit" name='cancel' value="取消"> 
        </form>
        _END;
    }
    catch(PDOException $e){
        echo $e->getMessage() . "<br>" . $e->getCode() . "<br>";
    }
?>