<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    User::promoteStaff(
        $_GET['id'],
      );

      header("Location: /admin/users");
      exit;

}

?>