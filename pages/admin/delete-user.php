<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    User::delete(
        $_GET['id'],
      );

      header("Location: /admin/users");
      exit;

}

?>