<?php
    echo <<<_END
    <html>
        <head>
            <title>PHP Form Upload</title>
        </head>
        <body>
            <form method = 'post' action = 'test.php' enctype = 'multipart/form-data'>
            Select File: 
                <input type = 'file' name = 'filename' size = '10'>
                <input type = 'submit' value = 'Upload'>
            </form>
    _END;
    
    if($_FILES){
        echo "Filename: " . $_FILES['filename']['name']."<br>";
        echo "Type : " . $_FILES['filename']['type'] ."<br>";
        echo "Size : " . $_FILES['filename']['size'] ."<br>";
        echo "Temp name: " . $_FILES['filename']['tmp_name'] ."<br>";
        echo "Error : " . $_FILES['filename']['error'] . "<br>";
        $name = $_FILES['filename']['name'];
        $name = "test.jpg";
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        echo "Upload image： '$name' <br><img src = '$name' style='height: 500px; width: 400px;'>";
    }
    echo "</body></html>"
?>