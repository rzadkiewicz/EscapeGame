<?php

   $pdo = new PDO('mysql:dbname=escapegame;host=localhost', 'root');
   
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   $res = $pdo->query('SELECT * FROM user');

   $data = $res->fetchALL(PDO::FETCH_OBJ);

    var_dump($data[0]->login);  
   


   
   ?>