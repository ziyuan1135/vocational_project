<?php
    require_once "header.php";
    global $pdo;
    $sysMessage = $userInput = $passInput = "";
    $success = false;

    if(isset($_POST['user'])){
        $userInput = sanitizeStr($_POST['user']);
        $passInput = sanitizeStr($_POST['pass']);

        if($userInput == "" || $passInput == ""){
            $sysMessage = "Not all fields were entered";
        }
        else{
            try{
                $stmt = $pdo->prepare("select pass from members where user=:user");
                $stmt->bindValue(":user", $userInput);
                $stmt->execute();
                $row = $stmt->fetch();
                if(checkPass($passInput, $row)){
                    $_SESSION['user'] = $userInput;
                    $_SESSION['pass'] = $passInput;
                    // die("<div class='center'>You are now logged in. Please 
                    //      <a data-role='slid' href='members.php?view=$userInput&r=$randstr'>Click here</a>
                    //      </div>");
                    $success = true;
                }
                else $sysMessage = "Invalid login attempt";
            }
            catch(PDOException $e){
                $sysMessage .= $e->getMessage() . "<br>";
                $sysMessage .= $e->getCode() . "<br>";
            }
        }
    }

    function checkPass($pass, $row){
        if($row){
            return password_verify($pass, $row['pass']);
        }
        return false;
    }

    function loginFormSetting(){
        global $randstr; global $sysMessage; global $userInput; global $passInput;
        echo <<<_END
        <form method="post" action="login.php?r=$randstr">
            <div data-role="fieldcontain">
                <label></label>
                <span class='error'>$sysMessage</span>
            </div>
            <div data-role="fieldcontain">
                <label></label>
                Please enter your details to log in
            </div>
            <div data-role="fieldcontain">
                <label>Username</label>
                <input type="text" maxlength="16" name="user" value="$userInput">
            </div>
            <div data-role="fieldcontain">
                <label>Password</label>
                <input type="password" maxlength="16" name="pass" value="$passInput">
            </div>
            <div data-role="fieldcontain">
                <label></label>
                <input data-transition='slide' type="submit" value="Login">
            </div>
        </form>
        _END;
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
                if(!$success) loginFormSetting();
                else echo "<div class='center'>You are now logged in. Please 
                <a data-role='slid' href='members.php?view=$userInput&r=$randstr'>Click here</a>
                </div>";
            ?>
        </div>
    </body>
</html>