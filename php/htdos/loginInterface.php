<?php 
    require_once "login.php";
    session_start();
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_SESSION);
    // echo "</pre>";
    // global var setting:
    $next_url = 'http://localhost/test1.php';

    // html configuration:
    echo <<<_END
    <form method="post" action="loginInterface.php">
    <span style="font-size:15px">
    <pre>
    帳號： $html_account_format

    密碼： $html_pass_format
    <span style="font-size:10px">  提示：帳號與密碼只接受數字與英文字母</span><br>
    <input type="submit" value="登入">
    </pre>
    </span>
    </form>
    _END;

    // get user input and process:
    if(isset($_POST['account']) && isset($_POST['pass'])){
        $input_acc= $_POST['account'];
        $input_pass = $_POST['pass'];
        if(check_userinput($input_acc, $input_pass)){
            try{
                $pdo = new PDO($attr, $user, $pass, $opts);
                for($i = 0; $i < count($tableArr); $i++){
                    $stmt = $pdo->prepare("SELECT password, id FROM $tableArr[$i] WHERE account=:account");
                    $stmt->bindValue(":account", $input_acc);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    if($input_pass == $result['password']) {
                        $_SESSION['user_type'] = $i;
                        $_SESSION['userID'] = $result['id'];
                        header("location:acc_mana_interface.php");
                        exit();
                    }
                }
            }
            catch (PDOException $e){
                echo $e->getMessage() . '<br>' . $e->getCode() . '<br><br>';
            }
        }
    }

    // function declaration:
    function check_userinput($acc, $pass){
        if(strlen($acc) == 0 || strlen($pass) == 0) return false;
        // check account
        for($i = 0; $i < strlen($acc); $i++){
            if($acc[$i]<'0' || ($acc[$i] > '9' && $acc[$i] < 'A') || 
            ($acc[$i] > 'Z' && $acc[$i] < 'a') || $acc[$i] > 'z'){
                echo "帳號：'$acc[$i]' not in [0-9, A-Z, a-z]<br>";
                return false;
            }
        }
        // check password
        global $pass_min_len;
        if(strlen($pass) < $pass_min_len) return false;
        for($i = 0; $i < strlen($pass); $i++){
            if($pass[$i]<'0' || ($pass[$i] > '9' && $pass[$i] < 'A') || 
            ($pass[$i] > 'Z' && $pass[$i] < 'a') || $pass[$i] > 'z'){
                echo "密碼：'$pass[$i]' not in [0-9, A-Z, a-z]<br>";
                return false;
            }
        }
        return true;
    }
    session_unset();
    session_destroy();
?>