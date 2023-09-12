<?php
    // login db setting:
    $host = 'localhost';
    $db = 'publication';
    $user = 'tester';
    $pass = 'password';
    $char = 'utf8mb4';
    $attr = "mysql:host=$host; dbname=$db; charset=$char";
    $opts =
    [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    // db configuration:
    $tableArr = array("sys_admin", "admin", "user");
    $sys_admin_columns = array('id', 'account', 'password', 'name','phone', 'email', 'create_date');
    $admin_columns = array('id', 'account', 'password', 'name', 'unit', 'phone', 'email', 'create_date');
    $user_columns = array('id', 'account', 'password', 'name', 'unit', 'phone', 'email', 'create_date');
    $output_format = array(5, 20, 20, 20, 15, 10, 30, 19);

    // other(temp):
    $pass_min_len = 8;
    $account=''; $password=''; $phone=''; $name=''; $unit=''; $email='';
    
    $html_account_format = "<input type='text' name='account' style='font-size:15px' 
    required pattern=[0-9A-za-z]+ placeholder=只能輸入數字與英文字母 maxlength='15'>";

    $html_pass_format = "<input type='password' name='pass' style='font-size:15px' 
    required pattern=[0-9A-za-z]+ minlength=\"$pass_min_len\"  maxlength='20'
    placeholder=至少8碼> ";

    $html_phone_format = "<input type='text' name='phone' style='font-size:15px' 
    required pattern=09[0-9]{8} placeholder=共10碼 value=$phone>";

    $html_name_format = "<input type='text' name='name' style='font-size:15px' 
    required maxlength='20'>";

    $html_unit_format = "<input type='text' name='unit' style='font-size:15px' 
    required maxlength='20'>";

    $html_email_format = "<input type='email' name='email' style='font-size:15px'
    required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$'>";
?>