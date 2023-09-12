<?php
    require_once "header.php";
    global $pdo;

    $sysMessage = $userInput = $passInput = '';
    $messageType = 'error';
    if(isset($_SESSION['user'])) destroySession();

    if(isset($_POST['user'])){
        $userInput = sanitizeStr($_POST['user']);
        $passInput = sanitizeStr($_POST['pass']);

        if($userInput == "" || $passInput == ""){
            $sysMessage = "Not all fields were entered<br><br>";
        }
        else{
            try{
                $stmt = $pdo->prepare("select * from members where user=:user");
                $stmt->bindValue(":user", $userInput);
                $stmt->execute();
                if($stmt->rowCount()) {
                    $sysMessage = "That username already exists<br><br>";
                }
                else{
                    $encryptedPass = password_hash($passInput, PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("insert into members values(:user, :pass)");
                    $stmt->bindValue(":user", $userInput);
                    $stmt->bindValue(":pass", $encryptedPass);
                    $stmt->execute();
                    $sysMessage = "registration success<br><br>";
                    $messageType = 'available';
                }
            }
            catch(PDOException $e){
                $sysMessage .= "<br>message: " . $e->getMessage();
                $sysMessage .= "<br>message: " . $e->getCode();
            }
        }
    }

    function signupFormSetting(){
        global $randstr; global $sysMessage; global $userInput; global $passInput; global $messageType;
        echo <<<_END
        <form method='post' action='signup.php?r=$randstr'>
            <div data-role="fieldcontain">
                <label></label>
                <span class='$messageType'>$sysMessage</span>
            </div>
            <div data-role='fieldcontain'>
                <label></label>
                Please enter your details to sign up
            </div>
            <div data-role='fieldcontain'>
                <label>Username</label>
                <input type='text' maxlength='16' name='user' value='$userInput' onblur="checkUser(this)">
                <label></label><div id='used'>&nbsp;</div>
            </div>
            <div data-role='fieldcontain'>
                <label>Password</label>
                <input type='text' maxlength='16' name='pass' value='$passInput'>
            </div>
            <div data-role='fieldcontain'>
                <label></label>
                <input data-transition='slide' type='submit' value='sign up'>
            </div>
        </form>"
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
                signupFormSetting(); 
            ?>
        </div>
    </body>
</html>