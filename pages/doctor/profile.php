<?php
if ( !Authentication::whoCanAccess('user') ) {
    header('Location: /login');
    exit;
}

// load user data
$doctor = User::getDoctorById( $_GET['id'] );
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
        <title>MedicalCare - Doctor Profile</title>
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
    <body class="d-flex flex-column min-vh-100">
        <!-- navbar -->
        <?php require dirname(__DIR__, 2) . '/models/header.php';?>
        <!-- Pricing section-->
        <section class="bg-light py-3">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Doctor Profile</h2>
                    <p class="lead mb-0">Get to know your health specialists!</p>
                </div>
                <div class="row">
                    
                    <div class="col-lg-4">
                        <!-- profile side panel -->
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="mb-3 text-center">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo $doctor['name']; ?>" class="rounded-circle shadow-4" style="width: 150px;" alt="Avatar" />
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-person-vcard-fill text-primary"></i>
                                        <strong>Name</strong>
                                    </li>
                                    <li class="mb-2">
                                        <?php echo $doctor['name']; ?>
                                    </li>

                                    <li class="mb-2">
                                        <i class="bi bi-telephone-fill text-primary"></i>
                                        <strong>Phone Number</strong>
                                    </li>
                                    <li class="mb-2">
                                        <?php echo $doctor['phone']; ?>
                                    </li>

                                    <li class="mb-2">
                                        <i class="bi bi-envelope-at-fill text-primary"></i>
                                        <strong>E-mail</strong>
                                    </li>
                                    <li class="mb-2">
                                        <?php echo $doctor['email']; ?>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <!-- additional info side panel -->
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="mb-3">
                                    <h2 class="">Book an appointment now!</h2>
                                    <p class="lead">Book an appointment with <b class="fw-bolder"><?php echo $doctor['name'] ?></b> today!</p>
                                </div>
                                
                                <?php if ( Authentication::whoCanAccess('user') ) : ?>
                        <div class="col">
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
                            <!-- doctor input(optional) -->
                            <div class="form-floating mb-3">
                                <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Preferred Doctor:</label>
                                <select class="form-control" name="preferred_doctor">
                                    <?php foreach( User::getAllDoctors() as $doctors ) : ?>
                                        <option value="<?php echo $doctors['id']; ?>" <?php if($doctors['id'] == $_GET['id']): echo "selected"; endif; ?>>Dr. <?php echo $doctors['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                            <!-- message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>

                            <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Submit</button></div>
                        </form>
                    </div>
                    <?php else: ?>
                        <div class="d-flex justify-content-center">
                            <a type="button" class="btn btn-link px-3 me-2" href="login">
                            Login
                            </a>
                            <a type="button" class="btn btn-primary me-3" href="signup">
                            Sign Up
                            </a>
                        </div>
                    <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php require dirname(__DIR__, 2) . '/models/footer.php';?>
    </body>
</html>
