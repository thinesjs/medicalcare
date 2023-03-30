<?php
if ( !Authentication::whoCanAccess('doctor') ) {
    header('Location: /login');
    exit;
}

if ( !(empty($_GET['id'])) ) {

    Appointment::updateStatus(
        $_GET['id'],
        'cancel'
      );

      header("Location: /doctor/appointments");
      exit;

}

?>