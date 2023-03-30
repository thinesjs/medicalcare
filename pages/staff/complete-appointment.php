<?php
if ( !Authentication::whoCanAccess('staff') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    Appointment::updateStatus(
        $_GET['id'],
        'complete'
      );

      header("Location: /staff/appointments");
      exit;

}

?>