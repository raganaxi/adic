<?php
  $uploaddir = 'images/posts/';
  $uploadfile = $uploaddir . basename($_FILES['file']['name']);
  $status = null;

  if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    header('Location: profile.php');
  } else {
    echo 'Problemas al registrar archivo';
  }
?>
