<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    Appointment::updateStatus(
        $_GET['id'],
        'complete'
      );

      header("Location: /admin/appointments");
      exit;

}

?>