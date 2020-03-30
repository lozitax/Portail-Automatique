<?php

  session_start();

  include 'bdd.php';

  if(isset($_SESSION['username'])){
    if(isset($_GET['username']) AND !empty($_GET['username'])){
      $supprime = $_GET['username'];

      $req = $bdd->prepare("DELETE FROM users WHERE username = ?");
      $req->execute(array($supprime));
      header("Location: users.php");
    }
  } else {
    header("Location: index.php");
  }

?>
