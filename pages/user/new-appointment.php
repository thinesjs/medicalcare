<?php
if ( !Authentication::whoCanAccess('user', 'staff', 'doctor') ) {
    header('Location: /login');
    exit;
}

// load user data
$user = User::getUserByID( $_SESSION['user']['id'] );

if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

    $prefers_doctor = ( 
        ( !empty( $_POST['preferred_doctor'] ) ) ? true : false
      );

    Appointment::add(
        $_SESSION['user']['id'],
        $_POST['title'],
        $_POST['message'],
        $_POST['service'],
        ( $prefers_doctor ? $_POST['preferred_doctor'] : null ),
        'pending'
      );

      header("Location: /appointments");
      exit;

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MedicalCare - New Appointment</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../assets/css/styles.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
        rel="stylesheet"
        />
    </head>
    <body class="d-flex flex-column min-vh-100 bg-light">
        <!-- navbar -->
        <?php require dirname(__DIR__, 2) . '/models/header.php';?>
        <!-- main section-->
        <section class="py-3">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Make Appointment</h2>
                    <p class="lead mb-0">We'd love to see you! Book an appointment now for free!</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            <!-- title input -->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="title" type="text" placeholder="Title" required/>
                                <label for="phone">Title</label>
                            </div>
                            <!-- service input -->
                            <div class="form-floating mb-3">
                                <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Service:</label>
                                <select class="form-control" name="service">
                                    <option value="">Choose a service*</option>
                                    <option value="Medical Services">Medical Services</option>
                                    <option value="Dental Services">Dental Services</option>
                                    <option value="Chiropractic Services">Chiropractic Services</option>
                                    <option value="Chinese Medicine Services">Chinese Medicine Services</option>
                                    <option value="Dialysis Services">Dialysis Services</option>
                                    <option value="Allied Health Services">Allied Health Services</option>
                                </select>
                                </div>
                            </div>

                            <!-- message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>

                            <!-- doc checkbox -->
                            <div class="form-check d-flex mb-3">
                                <input class="form-check-input me-2" type="checkbox" id="doctorCheck" onclick="showDocDropdown()"/>
                                <label class="form-check-label" for="doctorCheck">
                                Do you wish to consult a particular doctor?
                                </label>
                            </div>

                            <!-- doc input -->
                            <div class="form-floating mb-3" style="display:none" id="doctorInput">
                                <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Preferred Doctor:</label>
                                <select class="form-control" name="preferred_doctor">
                                    <option value="">-</option>
                                    <?php foreach( User::getAllDoctors() as $doctor ) : ?>
                                        <option value="<?php echo $doctor['id']; ?>">Dr. <?php echo $doctor['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>

                            <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php require dirname(__DIR__, 2) . '/models/footer.php';?>
    </body>
</html>
