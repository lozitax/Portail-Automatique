<?php

  include 'bdd.php';

    $req = $bdd->prepare("INSERT INTO activity(username, day, hour) VALUES('user' , NOW(), NOW())");
    $req->execute(array('user'));


?>

