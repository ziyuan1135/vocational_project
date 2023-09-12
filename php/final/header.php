<?php
    require_once 'function.php';
    session_start();
    date_default_timezone_set('Asia/Taipei');
    
    $userstr = "Welcome Guest";
    $randstr = substr(md5(rand()), 0, 7);
    $extraHint = "";

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $loggedin = true;
        $userstr = "Logged in as:'$user'";
    }
    else $loggedin = false;

    if($loggedin){
        $funcSetting = 
        "<a data-role='button' data-inline='true' data-icon='home'
            data-transition='slide' href='members.php?view=$user&r=$randstr'>Home</a>
        <a data-role='button' data-inline='true' data-icon='user'
            data-transition='slide' href='members.php?r=$randstr'>Members</a>
        <a data-role='button' data-inline='true' data-icon='heart'
            data-transition='slide' href='friends.php?r=$randstr'>Friends</a><br>
        <a data-role='button' data-inline='true' data-icon='mail'
            data-transition='slide' href='messages.php?r=$randstr'>Messages</a>
        <a data-role='button' data-inline='true' data-icon='edit'
            data-transition='slide' href='profile.php?r=$randstr'>Edit Profile</a>
        <a data-role='button' data-inline='true' data-icon='action'
            data-transition='slide' href='logout.php?r=$randstr'>Log out</a>";
    }
    else{
        $funcSetting = 
        "<a data-role='button' data-inline='true' data-icon='home'
            data-transition='slide' href='index.php?r=$randstr'>Home</a>
        <a data-role='button' data-inline='true' data-icon='plus'
            data-transition='slide' href='signup.php?r=$randstr'>Sign Up</a>
        <a data-role='button' data-inline='true' data-icon='check'
            data-transition='slide' href='login.php?r=$randstr'>Log In</a>";
        $extraHint = "<p class='info'>(You must be logged in to use this app)</p>";
    }

    // hmtl <head> setting
    function headSetting(){
        global $userstr;
        echo <<<_END
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
        <link rel='stylesheet' href='style.css' type='text/css'>
        <script src='javascript.js'></script>
        <script src='jquery-2.2.4.min.js'></script>
        <script src='jquery.mobile-1.4.5.min.js'></script>
        <title>Andrew's Nest: $userstr</title>
        _END;
    }

    //data-role:header and content
    function bodySetting(){
        global $userstr; global $extraHint; global $funcSetting;
        echo <<<_END
        <div data-role="header">
            <div id="logo" class="center">Andr<img id="robin" src="robin.gif">w's Nest</div>
            <div class="username">$userstr</div>
        </div>
        <div data-role="content">
            <div class="center">
                $funcSetting
            </div>
            $extraHint
        </div>
        _END;
    }
?>