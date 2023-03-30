<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    User::demoteStaff(
        $_GET['id'],
      );

      header("Location: /admin/doctors");
      exit;

}

?>