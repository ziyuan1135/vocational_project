<?php
    require_once "login.php";
    session_start();
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_SESSION);
    // echo "</pre>";

    echo <<<_END
    <form method="post" action="acc_mana_interface.php">
    <input type='submit' value='登出' name='signout'>
    </form>
    _END;

    if(isset($_POST['signout'])){
        session_unset();
        session_destroy();
        header("location:loginInterface.php");
        exit();
    }
    if (isset($_POST['create_admin'])){
        $_SESSION['targetTable'] = 'admin';
        header("location:createAccount.php");
        exit();
    }
    if (isset($_POST['create_user'])){
        $_SESSION['targetTable'] = 'user';
        header("location:createAccount.php");
        exit();
    }
    if(isset($_POST['modify'])){
        $_SESSION['targetTable'] = $_POST['tableType'];
        $_SESSION['targetID'] = $_POST['id'];
        header("location:modifyRow.php");
        exit();
    }
    if(isset($_POST['delete'])){
        try{
            $pdo = new PDO($attr, $user, $pass, $opts);
            $table = $_POST['tableType'];
            $id = $_POST['id'];
            $result = $pdo->query("DELETE FROM $table WHERE id=$id");
        }
        catch(PDOException $e){
            echo $e->getMessage() . "<br>" . $e->getCode() . "<br>";
        }
    }

    if($_SESSION['user_type'] == 0){
        echo <<<_END
        <form method="post" action="acc_mana_interface.php">
        <span style="font-size:25px">
        Admin:</span> <input type="submit" value="新增">
        <input type="hidden" name="create_admin" value="yes">
        </form>
        _END;
        try{
            $pdo = new PDO($attr, $user, $pass, $opts);
            $stmt = $pdo->query("SELECT * FROM $tableArr[1]");
            if($stmt->rowCount() == 0) echo "<pre>\t沒有資料\n\n</pre>";
            else{
                while($rowArr = $stmt->fetch()){
                    echo "<pre>";
                    for($i = 0; $i < count($admin_columns); $i++){
                        printf("%11s:  %.30s\n", htmlentities($admin_columns[$i]), htmlentities($rowArr[$admin_columns[$i]]));
                    }
                    $id = $rowArr['id'];
                    echo <<<_END
                    </pre>
                    <form method="post" action="acc_mana_interface.php">
                        <input type="submit" name='modify' value="修改">
                        <input type="submit" name='delete' value="刪除">
                        <input type="hidden" name="id" value="$id">
                        <input type="hidden" name="tableType" value="admin">
                    </form>
                    _END;
                };
                echo "<br><br>";
            }
        }
        catch(PDOException $e){
            echo $e->getMessage() . "<br>" . $e->getCode() . "<br>";
        }
    }
    if($_SESSION['user_type'] <= 1){
        if($_SESSION['user_type'] == 0) echo "<span style='font-size:25px'>User:</span><br>";
        else{
            echo <<<_END
            <form method="post" action="acc_mana_interface.php">
            <span style="font-size:25px">
            User:</span> <input type="submit" value="新增">
            <input type="hidden" name="create_user" value="yes">
            </form>
            _END;
        }
        try{
            $pdo = new PDO($attr, $user, $pass, $opts);
            $query = "SELECT * FROM $tableArr[2] ";
            if($_SESSION['user_type'] == 1) $query .= "WHERE admin_id=" . $_SESSION['userID'];
            // echo "query: $query<br>";
            $stmt = $pdo->query($query);
            if($stmt->rowCount() == 0) echo "<pre>\t沒有資料\n\n</pre>";
            else{
                while($rowArr = $stmt->fetch()){
                    echo "<pre>";
                    for($i = 0; $i < count($user_columns); $i++){
                        printf("%11s:  %.30s\n", htmlentities($user_columns[$i]), htmlentities($rowArr[$user_columns[$i]]));
                    }
                    $id = $rowArr['id'];
                    echo <<<_END
                    </pre>
                    <form method="post" action="acc_mana_interface.php">
                        <input type="submit" name='modify' value="修改">
                        <input type="submit" name='delete' value="刪除">
                        <input type="hidden" name="id" value="$id">
                        <input type="hidden" name="tableType" value="user">
                    </form>
                    _END;
                }
            }
        }
        catch(PDOException $e){
            echo $e->getMessage() . "<br>" . $e->getCode() . "<br>";
        }
    }
?>