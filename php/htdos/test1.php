<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if(count($_POST)){
        echo "count function activate<br>";
    }
    if(isset($_POST['account'])) echo "isset function activate<br>";
?>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="test1.php">
            <fieldset>
                <legend>section</legend>
                <div style="margin: 20px;">帳號：<input type="text" name="account"></div>
                <div style="margin: 20px;"><input type="submit" value="submit"></div>
            </fieldset>
        </form>
    </body>
</html>