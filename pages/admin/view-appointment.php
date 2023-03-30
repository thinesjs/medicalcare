<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

// load user data
$user = User::getUserByID( $_SESSION['user']['id'] );

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
        <title>MedicalCare - Admin - View Appointment</title>
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
                    <h2 class="fw-bolder">Admin Dashboard</h2>
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
                                class="nav-link"
                                href="/admin/dashboard"
                                role="tab"
                                >Home</a
                            >
                            <a
                                class="nav-link active"  
                                href="#"
                                role="tab"
                                >Appointments</a
                            >
                            <a class="text-muted text-start mt-3"><small>Site Management</small></a>
                            <li><hr class="dropdown-divider" /></li>
                            <a
                                class="nav-link"
                                href="nurses"
                                role="tab"
                                aria-selected="false"
                                >Manage Users</a
                            >
                            <a
                                class="nav-link"
                                href="nurses"
                                role="tab"
                                aria-selected="false"
                                >Manage Nurses</a
                            >
                            <a
                                class="nav-link"
                                href="doctors"
                                role="tab"
                                aria-selected="false"
                                >Manage Doctors</a
                            >
                            </div>
                            <!-- Tab navs -->
                        </div>

                        <div class="col-10">
                            <!-- Tab content -->
                            <div class="tab-content" id="v-tabs-tabContent">

                            <div class="mb-4">
                                <a type="button" class="btn btn-md btn-primary " href="/admin/appointments">Back</a>
                            </div>
                            
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
                                                    <?php if(empty($appointment['pd'])): echo "N/A"; else: echo "Dr. ".$appointment['pd']; endif; ?>
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
                                            <div class="text-muted mb-3">
                                                Appointment requested on <?php echo $appointment['created_on']; ?>
                                            </div>  
                                            
                                                                    
                                        </div>
                                        
                                        <div class="col-sm-1">
                                        <?php 
                                            switch( $appointment['status'] ) {
                                                case 'pending':
                                                    echo '<span class="badge rounded-pill bg-primary">PENDING</span>';
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
                                        <?php if( !empty($appointment['assigned_to']) ) : ?>
                                            <hr>
                                            <div class="mb-3">
                                                <p class="lead">Assignment Details</p>
                                            </div>
                                            <ul class="list-unstyled">
                                                <!-- doctor given -->
                                                <li class="mb-2">
                                                    <i class="bi bi-person-heart text-primary"></i>
                                                    <strong>Assigned Doctor</strong>
                                                </li>
                                                <li class="mb-2">
                                                    Dr. <?php echo $appointment['ad']; ?>
                                                </li>

                                                <!-- datetime given -->
                                                <li class="mb-2">
                                                    <i class="bi bi-calendar-event-fill text-primary"></i>
                                                    <strong>Assigned Schedule</strong>
                                                </li>
                                                <li class="mb-2">
                                                    <?php echo $appointment['schedule_on']; ?>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>                           
                                </div>
                            </div>
                            <?php if ( $appointment['status'] == "pending" ) : ?>
                            <div class="card h-100 mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-3">
                                        <h2 class="fw-bolder">Assign Doctor</h2>
                                        <p class="lead">Assigning a doctor approves the appointment!</p>
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
                                                    <select class="form-select form-select-sm" name="doctor">
                                                        <option selected>Choose a doctor...</option>
                                                        <?php foreach( User::getAllDoctors() as $doctor ) : ?>
                                                            <option value="<?php echo $doctor['id']; ?>">Dr. <?php echo $doctor['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </li>

                                                <!-- date n time -->
                                                <li class="mb-2">
                                                    <i class="bi bi-calendar-event-fill text-primary"></i>
                                                    <strong>Schedule</strong>
                                                </li>
                                                <li class="mb-2">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <div class="form-outline">
                                                                <input type="date" name="date" class="form-control" required/>
                                                                <label class="form-label" for="dob">Date</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm">
                                                        <div class="form-outline">
                                                                <input type="time" name="time" class="form-control" required/>
                                                                <label class="form-label" for="dob">Time</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </li>

                                                
                                            </ul>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-sm btn-success">Save</a>
                                            </div> 
                                        </form>
                                         
                                    </div>                           
                                </div>
                            </div>                              
                            <?php endif; ?>
                            
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
