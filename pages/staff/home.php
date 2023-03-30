<?php
if ( !Authentication::whoCanAccess('staff') ) {
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
        <title>MedicalCare - Staff</title>
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
        <!-- Pricing section-->
        <section class="bg-light py-3">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Nurse's Dashboard</h2>
                    <!-- <p class="lead mb-0">Keep track of your appointments!</p> -->
                </div> 
            </div>
            <div class="container-fluid px-5 mb-5">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- Tab navs -->
                            <div
                            class="nav flex-column nav-tabs text-center"
                            id="v-tabs-tab"
                            role="tablist"
                            aria-orientation="vertical"
                            >
                            <a class="text-muted text-start mt-3"><small>Dashboard</small></a>
                            <li><hr class="dropdown-divider" /></li>
                            <a
                                class="nav-link active"
                                href="#"
                                role="tab"
                                aria-selected="true"
                                >Home</a
                            >
                            <a
                                class="nav-link"  
                                href="appointments"
                                role="tab"
                                aria-selected="false"
                                >Appointments</a
                            >
                            <!-- <a class="text-muted text-start mt-3"><small>Site Management</small></a>
                            <li><hr class="dropdown-divider" /></li>
                            <a
                                class="nav-link"
                                href="doctors"
                                role="tab"
                                aria-selected="false"
                                >Manage Doctors</a
                            > -->
                            </div>
                            <!-- Tab navs -->
                        </div>

                        <div class="col-10">
                            <!-- Tab content -->
                            <div class="tab-content" id="v-tabs-tabContent">
                                
                                <div class="container">
                                    <div class="card mb-3">
                                        <div class="icon-wrap px-4 pt-4 d-flex justify-content-center align-items-center">
                                            <div class="icon d-flex justify-content-center align-items-center bg-primary rounded-circle ps-3 pe-3 pt-2 pb-2">
                                                <span class="bi bi-heart-pulse-fill text-light"></span>
                                            </div>
                                        </div>
                                        <div class="card-body pb-5 px-4">
                                            <h5 class="card-title">Manage Appointments</h5>
                                            <p class="card-text">Schedule appointment request made by users and assign them to doctors!</p>
                                            <a href="appointments" class="btn btn-primary d-grid">View Appointments</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <h1 class="fw-bolder ms-3 mt-3"><?php echo Appointment::getTotalAppointments()['total']; ?></h1>
                                                    </div>
                                                    <div class="col-md-10 justify-content-center">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Total Appointments</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <h1 class="fw-bolder ms-3 mt-3"><?php echo Appointment::getNoAppointments("pending")['total']; ?></h1>
                                                    </div>
                                                    <div class="col-md-10 justify-content-center">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Pending Appointments</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2">
                                                        <h1 class="fw-bolder ms-3 mt-3"><?php echo Appointment::getNoAppointments("complete")['total']; ?></h1>
                                                    </div>
                                                    <div class="col-md-10 justify-content-center">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Completed Appointments</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <!-- Tab content -->
                        </div>
                    </div>
                </div>
        </section>
        <!-- Footer-->
        <?php require dirname(__DIR__, 2) . '/models/footer.php';?>
    </body>
</html>
