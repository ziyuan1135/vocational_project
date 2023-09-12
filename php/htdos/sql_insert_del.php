<?php
    require_once 'login.php';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    try{
        $pdo = new PDO($attr, $user, $pass, $opts);
    }
    catch(PDOException $e){
        die("Fatal Error\n");
    }

    if(isset($_POST['delete']) && isset($_POST['isbn'])){
        $stmt = $pdo->prepare("DELETE FROM classic WHERE isbn=:isbn");
        $stmt->bindValue(":isbn", $_POST['isbn']);
        $stmt->execute();
    }

    if(isset($_POST['author']) &&
      isset($_POST['title']) &&
      isset($_POST['category']) &&
      isset($_POST['year']) &&
      isset($_POST['isbn']))
    {
        try{
            $stmt = $pdo->prepare("INSERT INTO  classic VALUES(:author, :title, :category, :year, :isbn)");
            $stmt->bindValue(":author", $_POST['author']);
            $stmt->bindValue(":title", $_POST['title']);
            $stmt->bindValue(":category", $_POST['category']);
            $stmt->bindValue(":year", $_POST['year']);
            $stmt->bindValue(":isbn", $_POST['isbn']);
            $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage() . '<br>';
        }
    }

    echo <<<_END
    <form action="sql_insert_del.php" method="post"> 
    <pre>
      Author <input type="text" name="author">
       Title <input type="text" name="title">
    Category <input type="text" name="category">
        Year <input type="text" name="year">
        ISBN <input type="text" name="isbn">
             <input type="submit" name="增加紀錄">
    </pre>
    </form>
    _END;

    $query = "SELECT * FROM classic";
    $result = $pdo->query($query);

    while($rowArray = $result->fetch(PDO::FETCH_NUM)){
        $c0 = htmlspecialchars($rowArray[0]);
        $c1 = htmlspecialchars($rowArray[1]);
        $c2 = htmlspecialchars($rowArray[2]);
        $c3 = htmlspecialchars($rowArray[3]);
        $c4 = htmlspecialchars($rowArray[4]);

        echo "<pre>";
        printf("%8s\t%s\n", "Author", $c0);
        printf("%8s\t%s\n", "Title", $c1);
        printf("%8s\t%s\n", "Category", $c2);
        printf("%8s\t%s\n", "Year", $c3);
        printf("%8s\t%s\n", "ISBN", $c4);
        echo "</pre>";

        echo <<<_END
        <form action="sql_insert_del.php" method="post">
            <input type="hidden" name="delete" value="yes">
            <input type="hidden" name="isbn" value="$c4">
            <input type="submit" value="刪除紀錄"> 
        </form>
        _END;
    }
?>