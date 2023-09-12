<?php
    require_once "header.php";
    global $pdo;
    $sysMessage = $text = '';

    if(!$loggedin) header("Location: index.php?r=$randstr");

    $stmt = $pdo->prepare("select * from profiles where user=:user");
    $stmt->bindValue(":user", $user);
    $stmt->execute();

    if(isset($_POST['text'])){
        $text = sanitizeStr($_POST['text']);
        $text = preg_replace("/\s\s+/", ' ', $text);
        if($stmt->rowCount()){
            try{
                $stmt = $pdo->prepare("update profiles set text=:text where user=:user");
                $stmt->bindValue(":text", $text);
                $stmt->bindValue(":user", $user);
                $stmt->execute();
            }
            catch(PDOException $e){
                $sysMessage .= $e->getMessage() . "<br><br>";
                $sysMessage .= $e->getCode();
            }
        }
        else{
            try{
                $stmt = $pdo->prepare("insert into profiles values(:user, :text)");
                $stmt->bindValue(":text", $text);
                $stmt->bindValue(":user", $user);
                $stmt->execute();
            }
            catch(PDOException $e){
                $sysMessage .= $e->getMessage() . "<br><br>";
                $sysMessage .= $e->getCode();
            }
        }
    }
    else{
        if($stmt->rowCount()){
            $row = $stmt->fetch();
            $text = $row['text'];
        }
    }

    if(isset($_FILES['image']['name'])){
        $saveto = "$user.jpg";
        $typeCheck = true;
        switch($_FILES['image']['type']){
            case "image/gif": $imageSrc = imagecreatefromgif($_FILES['image']['tmp_name']); break;
            case "image/jpeg":
            case "image/pjpeg":  $imageSrc = imagecreatefromjpeg($_FILES['image']['tmp_name']); break;
            case "image/png": $imageSrc = imagecreatefrompng($_FILES['image']['tmp_name']); break;
            default: $typeCheck = false;
        }

        if($typeCheck){
            move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
            list($width, $height) = getimagesize($saveto);
            $max = 100;
            $desWidth = $width;
            $desHeight = $height;

            if($width > $height && $max < $width){
                $desHeight = $max / $width * $height;
                $desWidth = $max;
            }
            elseif($height > $width && $max < $height){
                $desWidth = $max / $height * $width;
                $desHeight = $max;
            }
            elseif($max < $w) $desHeight = $tempWitdh = $max;

            $imageDes = imagecreatetruecolor($desWidth, $desHeight);
            imagecopyresampled($imageDes, $imageSrc, 0, 0, 0, 0, $desWidth, $desHeight, $width, $height);
            imageconvolution($imageDes, array(array(-1, -1, -1), array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
            imagejpeg($imageDes, $saveto);
            imagedestroy($imageDes);
            imagedestroy($imageSrc);
        }
    }

    function profilePageSetting(){
        global $user; global $text; global $randstr;
        echo "<h3>Your Profile</h3>";
        showProfile($user);
        echo <<<_end
        <form data-ajax='false' method='post' action='profile.php?r=$randstr' enctype='multipart/form-data'>
            <h3>Enter or edit your details and/or upload an image</h3>
            <textarea name='text'>$text</textarea><br>
            Image: <input type="file" name="image" size=14>
            <input type="submit" value="Save Profile">
        </form>
        _end;
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
            profilePageSetting(); 
        ?>
        </div>
    </body>
</html>