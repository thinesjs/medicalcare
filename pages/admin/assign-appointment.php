<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}



if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

    Appointment::assignDoctor(
        $_POST['id'],
        $_POST['doctor'],
        ($_POST['date'] . " " . $_POST['time']),
      );

      header("Location: /admin/appointments");
      exit;

}

?>