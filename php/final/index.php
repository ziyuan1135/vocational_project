<?php
    require_once 'header.php';

    function homeSetting(){
        global $loggedin; global $user;
        $welcomeStr = $loggedin ? " $user, you are logged in" : " please sign up or log in";
        echo <<<_END
        <div class="center">
                Welcome to Robin's Nest,$welcomeStr
        </div>
        <br>
        <div data-role="footer">
            <h4>Web App from <i><a href='https://github.com/RobinNixon/lpmj6'
            target='_blank'>Learning PHP MySQL & JavaScript</a></i></h4>
        </div> 
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
                homeSetting(); 
            ?>
        </div>
    </body>
</html>