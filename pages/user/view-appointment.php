<?php
if ( !Authentication::whoCanAccess('user') ) {
    header('Location: /login');
    exit;
}

// load appointment data
$appointment = Appointment::getAppointmentByID( $_GET['id'] );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MedicalCare - View Appointment</title>
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
        <section class="py-3">
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

                    <h2 class="fw-bolder">Viewing Appointment</h2>
                    <p class="lead mb-0">#<?php echo $_GET['id']; ?></p>
                </div>
                <div class="mb-4">
                    <a type="button" class="btn btn-md btn-primary " href="/appointments">Back</a>
                </div>
                
                <div class="row">
                    <div class="card h-100 mb-4">
                        <div class="card-body p-5">

                            <div class="row">
                                <div class="col-sm-11">
                                    <ul class="list-unstyled">
                                        <!-- title -->
                                        <li class="mb-2">
                                            <i class="bi bi-person-vcard-fill text-primary"></i>
                                            <strong>Title</strong>
                                        </li>
                                        <li class="mb-2">
                                            <?php echo $appointment['title']; ?>
                                        </li>

                                        <!-- service -->
                                        <li class="mb-2">
                                            <i class="bi bi-heart-pulse-fill text-primary"></i>
                                            <strong>Service</strong>
                                        </li>
                                        <li class="mb-2">
                                            <?php echo $appointment['service']; ?>
                                        </li>

                                        <!-- doctor -->
                                        <li class="mb-2">
                                            <i class="bi bi-person-heart text-primary"></i>
                                            <strong>Preferred Doctor</strong>
                                        </li>
                                        <li class="mb-2">
                                            Dr. <?php echo $appointment['pd']; ?>
                                        </li>

                                        <!-- desc -->
                                        <li class="mb-2">
                                            <i class="bi bi-file-earmark-medical-fill text-primary"></i>
                                            <strong>Message</strong>
                                        </li>
                                        <li class="mb-2">
                                            <?php echo $appointment['message']; ?>
                                        </li>
                                    </ul>
                                    <div class="text-muted">
                                        You requested for this appointment created on <?php echo $appointment['created_on']; ?>
                                    </div>  
                                                              
                                </div>
                                
                                <div class="col-sm-1">
                                <?php 
                                    switch( $appointment['status'] ) {
                                        case 'pending':
                                            if(!empty($appointment['assigned_to'])):
                                                echo '<span class="badge rounded-pill bg-warning">APPROVED</span>';
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
                                </div>
                            </div>




                                                        
                        </div>
                    </div>
                    <?php if ( !empty($appointment['assigned_to']) ) : ?>
                            <div class="card h-100 mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-3">
                                        <h2 class="fw-bolder">Hooray!</h2>
                                        <p class="lead">Your appointment request has been approved!</p>
                                    </div>
                                    <div class="row">
                                        <form method="post" action="assign">
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                                            <ul class="list-unstyled">
                                                <!-- title -->
                                                <li class="mb-2">
                                                    <i class="bi bi-person-heart text-primary"></i>
                                                    <strong>Doctor</strong>
                                                </li>
                                                <li class="mb-2">
                                                    Dr. <?php echo $appointment['ad']; ?>
                                                </li>

                                                <!-- date n time -->
                                                <li class="mb-2">
                                                    <i class="bi bi-calendar-event-fill text-primary"></i>
                                                    <strong>Schedule</strong>
                                                </li>
                                                <li class="mb-2">
                                                    <?php echo $appointment['schedule_on']; ?>
                                                </li>

                                                
                                            </ul>
                                        </form>
                                         
                                    </div>                           
                                </div>
                            </div>                              
                            <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php require dirname(__DIR__, 2) . '/models/footer.php';?>
    </body>
</html>
