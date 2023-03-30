<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    User::promoteDoctor(
        $_GET['id'],
      );

      header("Location: /admin/nurses");
      exit;

}

?>