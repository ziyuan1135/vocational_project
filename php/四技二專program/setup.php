<?php
    require_once "functions.php";

    createTable("地區", "
    地區ID TINYINT AUTO_INCREMENT,
    地區類型 VARCHAR(7) not null,
    PRIMARY KEY(地區ID)");

    createTable("縣市", "
    縣市ID TINYINT AUTO_INCREMENT,
    縣市名稱 VARCHAR(6) NOT NULL,
    地區ID TINYINT,
    PRIMARY KEY(縣市ID),
    FOREIGN KEY(地區ID) REFERENCES 地區(地區ID) ON DELETE CASCADE ON UPDATE CASCADE");

    createTable("鄉鎮市區", 
    "行政區ID SMALLINT AUTO_INCREMENT,
    區號 CHAR(3) NOT NULL,
    行政區名稱 VARCHAR(8) NOT NULL,
    縣市ID TINYINT,
    PRIMARY KEY(行政區ID),
    FOREIGN KEY(縣市ID) REFERENCES 縣市(縣市ID) ON DELETE CASCADE ON UPDATE CASCADE");

    createTable("學校", 
    "學校ID CHAR(3),
    校名 VARCHAR(20) NOT NULL,
    網址 VARCHAR(45),
    PRIMARY KEY(學校ID)");
    
    createTable('分校', 
    "分校ID SMALLINT AUTO_INCREMENT,
    校區 VARCHAR(6) NOT NULL,
    地址 VARCHAR(35) NOT NULL,
    學校ID CHAR(3),
    地區ID tinyint,
    縣市ID tinyint,
    行政區ID SMALLINT,
    PRIMARY KEY(分校ID),
    FOREIGN KEY(學校ID) REFERENCES 學校(學校ID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(地區ID) REFERENCES 地區(地區ID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(縣市ID) REFERENCES 縣市(縣市ID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(行政區ID) REFERENCES 鄉鎮市區(行政區ID) ON DELETE CASCADE ON UPDATE CASCADE");

    createTable('科系', 
    '科系ID int AUTO_INCREMENT,
    科系名稱 VARCHAR(25),
    PRIMARY KEY(科系ID)');

    createTable('甄選',
    '類群ID CHAR(2) NOT NULL,
    類群名稱 VARCHAR(12) NOT NULL,
    類型 TINYINT,
    PRIMARY KEY(類群ID)');

    createTable('技優', 
    '類別ID CHAR(2) NOT NULL,
    類別名稱 VARCHAR(8) NOT NULL,
    類型 TINYINT,
    PRIMARY KEY(類別ID)');

    createTable('112甄選', 
    '類群ID CHAR(2) NOT NULL,
    分校ID SMALLINT NOT NULL,
    科系ID INT NOT NULL,
    FOREIGN KEY(類群ID) REFERENCES 甄選(類群ID),
    FOREIGN KEY(分校ID) REFERENCES 分校(分校ID),
    FOREIGN KEY(科系ID) REFERENCES 科系(科系ID)');
?>