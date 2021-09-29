<?php

//require __DIR__ . '/vendor/autoload.php';

header('Location: /main/');
die();

// try{
//     $db = new PDO("mysql:host=host.docker.internal:3306;dbname=testdb", "root", "mypassword");
// }catch(PDOException $e){
//     print $e->getMessage();
// }
// $query = $db->query("SELECT * FROM persons", PDO::FETCH_ASSOC);
// if ( $query->rowCount() ){
//      foreach( $query as $row ){
//           print $row['name']."<br>";
//      }
// }