<?php
    require_once 'login.php';
    session_start();
    date_default_timezone_set("Asia/Taipei");
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_SESSION);
    // echo "target table: ". $_SESSION['targetTable'] . "<br>";
    // echo "</pre>";

    echo <<<_END
    <form method="post" action="createAccount.php">
    <span style="font-size:15px">
    <pre>
       帳號: $html_account_format
       密碼: $html_pass_format
       名字: $html_name_format
       單位: $html_unit_format
       手機: $html_phone_format
      email: $html_email_format
    <input type="submit" value="送出"> </pre> </form>
    <form method="post" action="createAccount.php">
    <input type="submit" name='cancel' value="取消"> 
    </form>
    _END;

    if(isset($_POST['cancel'])){
        header("location:acc_mana_interface.php");
        exit();
    }
    if(isset($_POST['account']) && isset($_POST['pass']) && isset($_POST['name'])
    && isset($_POST['unit']) && isset($_POST['phone']) && isset($_POST['email'])){
        try{
            $table =  $_SESSION['targetTable'];
            $pdo = new PDO($attr, $user, $pass, $opts);
            $query = "INSERT INTO $table VALUES(
                NULL, :account, :pass, :name, :unit, :phone, :email, :date, :fk_id)";
            // echo "query: $query<br>";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(":account", $_POST['account']);
            $stmt->bindValue(":pass", $_POST['pass']);
            $stmt->bindValue(":name", $_POST['name']);
            $stmt->bindValue(":phone", $_POST['phone']);
            $stmt->bindValue(":email", $_POST['email']);
            $stmt->bindValue(":unit", $_POST['unit']);
            $stmt->bindValue(":fk_id", $_SESSION['userID']);
            $stmt->bindValue("date", date('Y-m-d H:i:s'));
            $stmt->execute();
            header("location:acc_mana_interface.php");
            exit();
        }
        catch (PDOException $e){
            echo $e->getMessage() . '<br>' . $e->getCode() . '<br>';
        }
    }
?>