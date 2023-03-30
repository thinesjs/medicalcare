<?php
if ( !Authentication::whoCanAccess('staff') ) {
    header('Location: /login');
    exit;
}

// ini_set ('display_errors', 1);
// ini_set ('display_startup_errors', 1);
// error_reporting (E_ALL);

if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

    Appointment::assignDoctor(
        $_POST['id'],
        $_POST['doctor'],
        ($_POST['date'] . " " . $_POST['time']),
      );

      header("Location: /staff/appointments");
      exit;

}

?>