<?php
if ( !Authentication::whoCanAccess('user') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    Appointment::updateStatus(
        $_GET['id'],
        'cancel'
      );

      header("Location: /appointments");
      exit;

}

?>