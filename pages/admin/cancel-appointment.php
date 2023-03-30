<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    Appointment::updateStatus(
        $_GET['id'],
        'cancel'
      );

      header("Location: /admin/appointments");
      exit;

}

?>