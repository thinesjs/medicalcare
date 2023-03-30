<?php
if ( !Authentication::whoCanAccess('user') ) {
    header('Location: /login');
    exit;
}

// load user data
$user = User::getUserByID( $_SESSION['user']['id'] );

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
                                        <?php echo $user['name']; ?>
                                    </li>

                                    <li class="mb-2">
                                        <i class="bi bi-calendar-date-fill text-primary"></i>
                                        <strong>Date of Birth</strong>
                                    </li>
                                    <li class="mb-2">
                                        <?php echo $user['dob']; ?>
                                    </li>

                                    <li class="mb-2">
                                        <i class="bi bi-person-vcard text-primary"></i>
                                        <strong>NRIC</strong>
                                    </li>
                                    <li class="mb-2">
                                        <?php echo $user['nric']; ?>
                                    </li>

                                    <li class="mb-2">
                                        <i class="bi bi-telephone-fill text-primary"></i>
                                        <strong>Phone Number</strong>
                                    </li>
                                    <li class="mb-2">
                                        <?php echo $user['phone']; ?>
                                    </li>

                                    <li class="mb-2">
                                        <i class="bi bi-envelope-at-fill text-primary"></i>
                                        <strong>E-mail</strong>
                                    </li>
                                    <li class="mb-2">
                                        <?php echo $user['email']; ?>
                                    </li>
                                    
                                </ul>
                                <div class="d-grid"><a class="btn btn-outline-primary" href="/profile/edit">Edit Profile</a></div>
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
                                
                                <ul class="list-unstyled mb-4 mt-5">
                                    <li class="mb-2">
                                        <strong>Blood Group</strong>
                                    </li>

                                    <!-- bg -->
                                    <li class="mb-2">
                                        <?php if(isset($user['blood_group'])) : echo $user['blood_group']; else: echo "N/A"; endif; ?>
                                    </li>
                                </ul>

                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <strong>Diet</strong>
                                    </li>

                                    <!-- diet -->
                                    <li class="mb-2">
                                        <?php if(isset($user['diet'])) : echo $user['diet']; else: echo "N/A"; endif; ?>
                                    </li>
                                </ul>

                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <strong>Allergy Informations</strong>
                                    </li>

                                    <!-- allergy input -->
                                    <li class="mb-2">
                                        <?php if(isset($user['allergy_info'])) : echo $user['allergy_info']; else: echo "N/A"; endif; ?>
                                    </li>
                                </ul>
                                
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
