<?php
if ( !Authentication::whoCanAccess('user') ) {
    header('Location: /login');
    exit;
}

// load user data
$user = User::getUserByID( $_SESSION['user']['id'] );

if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

    if ( $user['email'] !== $_POST['email'] ) {
    $error .= FormValidation::checkEmailUniqueness( $_POST['email'] );
    }

    // make sure there is no error
    if ( !$error ) {
    // step 4: update user
    User::update(
        $user['id'], 
        $_POST['name'], 
        $_POST['dob'], 
        $_POST['nric'], 
        $_POST['phone'], 
        $_POST['email'],
        ( !empty($_POST['blood_grp']) ? $_POST['blood_grp'] : null ), 
        ( !empty($_POST['diet']) ? $_POST['diet'] : null ), 
        ( !empty($_POST['allergy']) ? $_POST['allergy'] : null ), 
    );
    
    header("Location: /profile");
    exit;

    }
  }



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MedicalCare - Profile</title>
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
                        <!-- sub navbar -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-login" href="#" role="tab"
                                aria-controls="pills-login" aria-selected="true">Profile</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-register" href="appointments" role="tab"
                                aria-controls="pills-register" aria-selected="false">Appointments</a>
                            </li>

                        </ul>

                    <h2 class="fw-bolder">Profile</h2>
                    <p class="lead mb-0">Keep your personal details up to date and accurate!</p>
                </div>
                <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                    <div class="row">
                        
                        <div class="col-lg-4">
                            <!-- profile side panel -->
                            <div class="card h-100 mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3 text-center">
                                        <img src="https://ui-avatars.com/api/?name=<?php echo $user['name']; ?>" class="rounded-circle shadow-4" style="width: 150px;" alt="Avatar" />
                                    </div>
                                    
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-person-vcard-fill text-primary"></i>
                                            <strong>Name</strong>
                                        </li>
                                        <li class="mb-2">
                                            <div class="form-outline mb-4">
                                                <input type="text" name="name" class="form-control" value="<?php echo $user['name'];?>"/>
                                                <label class="form-label" for="name">Name</label>
                                            </div>
                                        </li>

                                        <li class="mb-2">
                                            <i class="bi bi-calendar-date-fill text-primary"></i>
                                            <strong>Date of Birth</strong>
                                        </li>
                                        <li class="mb-2">
                                            <div class="form-outline mb-4">
                                                <input type="date" name="dob" class="form-control" value="<?php echo $user['dob'];?>"/>
                                                <label class="form-label" for="dob">Date of Birth</label>
                                            </div>
                                        </li>

                                        <li class="mb-2">
                                            <i class="bi bi-person-vcard text-primary"></i>
                                            <strong>NRIC</strong>
                                        </li>
                                        <li class="mb-2">
                                            <div class="form-outline mb-4">
                                                <input type="text" name="nric" class="form-control" value="<?php echo $user['nric'];?>"/>
                                                <label class="form-label" for="nric">NRIC</label>
                                            </div>
                                        </li>

                                        <li class="mb-2">
                                            <i class="bi bi-telephone-fill text-primary"></i>
                                            <strong>Phone Number</strong>
                                        </li>
                                        <li class="mb-2">
                                            <div class="form-outline mb-4">
                                                <input type="tel" name="phone" class="form-control" value="<?php echo $user['phone'];?>"/>
                                                <label class="form-label" for="phone">Phone Number</label>
                                            </div>
                                        </li>

                                        <li class="mb-2">
                                            <i class="bi bi-envelope-at-fill text-primary"></i>
                                            <strong>E-mail</strong>
                                        </li>
                                        <li class="mb-2">
                                            <div class="form-outline mb-4">
                                                <input type="email" name="email" class="form-control" value="<?php echo $user['email'];?>"/>
                                                <label class="form-label" for="email">Email</label>
                                            </div>
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
                                        <h2 class="fw-bolder">Additional Information</h2>
                                        <p class="lead">These informations can let the doctors understand you better!</p>
                                    </div>
                                    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                        <ul class="list-unstyled mb-4 mt-5">
                                            <li class="mb-2">
                                                <strong>Blood Group</strong>
                                            </li>

                                            <!-- bg input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" name="blood_grp" class="form-control" value="<?php echo $user['blood_group'];?>"/>
                                                <label class="form-label" for="blood_grp">Blood Group</label>
                                            </div>
                                        </ul>

                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2">
                                                <strong>Diet</strong>
                                            </li>

                                            <!-- diet input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" name="diet" class="form-control" value="<?php echo $user['diet'];?>"/>
                                                <label class="form-label" for="diet">Diet</label>
                                            </div>
                                        </ul>

                                        <ul class="list-unstyled mb-4">
                                            <li class="mb-2">
                                                <strong>Allergy Informations</strong>
                                            </li>

                                            <!-- allergy input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" name="allergy" class="form-control" value="<?php echo $user['allergy_info'];?>"/>
                                                <label class="form-label" for="allergy">Allergy Informations</label>
                                            </div>
                                        </ul>
                                    </form>
                                    <div class="d-grid"><button type="submit" class="btn btn-outline-primary">Save</button></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <?php require dirname(__DIR__, 2) . '/models/footer.php';?>
    </body>
</html>
