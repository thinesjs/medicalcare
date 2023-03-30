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
        <title>MedicalCare - Appointments</title>
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
                        <!-- sub navbar -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-login" href="profile" role="tab"
                                aria-controls="pills-login" aria-selected="true">Profile</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-register" href="#" role="tab"
                                aria-controls="pills-register" aria-selected="false">Appointments</a>
                            </li>

                        </ul>

                    <h2 class="fw-bolder">Appointments</h2>
                    <p class="lead mb-0">Keep track of your appointments!</p>
                </div>
                <div class="mb-4">
                    <a type="button" class="btn btn-md btn-primary " href="/appointment/new">Add</a>
                </div>
                
                <div class="row">
                    <?php if ( empty( Appointment::getAppointments($_SESSION['user']['id']) ) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            You have not made any appointments. 
                        </div>
                    <?php else : ?>
                    <?php foreach( Appointment::getAppointments($_SESSION['user']['id']) as $appointment ) : ?>
                        <div class="card h-100 mb-4 <?php if(!empty($appointment['assigned_to']) && $appointment['status'] == 'pending'): echo "border border-success"; endif;?>">
                            <div class="card-body p-5">


                            <div class="row">
                                <div class="col-sm-11">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">                                       
                                            <strong>Appointment ID #<?php echo $appointment['aid']; ?></strong>
                                            <?php 
                                                switch( $appointment['status'] ) {
                                                    case 'pending':
                                                        if(!empty($appointment['assigned_to'])):
                                                            echo '<span class="badge rounded-pill bg-warning">APPROVED</span>';
                                                            echo '<span class="badge rounded-pill bg-primary ms-1">' . $appointment['schedule_on'] .'</span>';
                                                        else:
                                                            echo '<span class="badge rounded-pill bg-secondary">PENDING</span>';
                                                        endif;
                                                        break;
                                                    case 'complete':
                                                        echo '<span class="badge rounded-pill bg-success">CONSULTED</span>';
                                                        break;
                                                    case 'cancel':
                                                        echo '<span class="badge rounded-pill bg-danger">CANCELED</span>';
                                                        break;
                                                }
                                            ?>
                                        </li>
                                        <li class="mb-2">
                                        <i class="bi bi-info-square-fill text-primary"></i>
                                            <?php echo $appointment['title']; ?>
                                        </li>
                                    </ul>
                                    <?php if(!empty($appointment['assigned_to'])): ?>
                                    <div class="text-muted">
                                        Your appointment have been scheduled on <?php echo $appointment['schedule_on']; ?> with <a href="/doctor/profile?id=<?php echo $appointment['id']; ?>">Dr. <?php echo $appointment['ad']; ?></a>
                                    </div>     
                                    <?php else: ?>
                                    <div class="text-muted">
                                        You requested for this appointment on <?php echo $appointment['created_on']; ?>                                    
                                    </div>    
                                    <?php endif; ?>                         
                                </div>
                                
                                <div class="col-sm-1">
                                    <a class="btn btn-outline-primary btn-sm d-grid mb-2" href="appointment/view?id=<?php echo $appointment['aid']; ?>">View</a>
                                    <?php if ( $appointment['status'] == "pending" && empty($appointment['assigned_to'] )) : ?>
                                        <a class="btn btn-danger btn-sm d-grid" href="appointment/cancel?id=<?php echo $appointment['aid']; ?>">Cancel</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                                
                                
                            </div>
                        </div>
                    <?php endforeach; ?> 
                    <?php endif; ?> 
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php require dirname(__DIR__, 2) . '/models/footer.php';?>
    </body>
</html>
