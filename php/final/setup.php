<html>
    <head>
        <title>Setting up database</title>
    </head>
    <body>
        Setting up...<br>
        <?php
            require_once 'function.php';

            createTable('members', 
                        'user VARCHAR(16),
                        pass VARCHAR(80),
                        INDEX(user(6)),
                        PRIMARY KEY(user)');

            createTable('messages', 
                        'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        auth VARCHAR(16),
                        recip VARCHAR(16),
                        pm CHAR(1),
                        time DATETIME,
                        message VARCHAR(4096),
                        INDEX(auth(6)),
                        INDEX(recip(6))');
            
            createTable('friends',
                        'user VARCHAR(16),
                        friend VARCHAR(16),
                        INDEX(user(6)),
                        INDEX(friend(6))');
            
            createTable('profiles',
                        'user VARCHAR(16),
                        text VARCHAR(4096),
                        INDEX(user(6))');
        ?>
        ...done
    </body>
</html>