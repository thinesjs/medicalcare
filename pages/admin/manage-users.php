<?php
if ( !Authentication::whoCanAccess('admin') ) {
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
        <title>MedicalCare - Admin - Users</title>
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
                                href="dashboard"
                                role="tab"
                                >Home</a
                            >
                            <a
                                class="nav-link"  
                                href="appointments"
                                role="tab"
                                >Appointments</a
                            >
                            <a class="text-muted text-start mt-3"><small>Site Management</small></a>
                            <li><hr class="dropdown-divider" /></li>
                            <a
                                class="nav-link active"
                                href="#"
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
                                    <a type="button" class="btn btn-md btn-primary " href="user/new">Add User</a>
                                </div>
                                <div class="row">
                                    <?php if ( empty( User::getAllPatients() ) ) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            There is no users in the system.
                                        </div>
                                    <?php else : ?>
                                    <?php foreach( User::getAllPatients() as $patients ) : ?>
                                        <div class="card h-100 mb-4">
                                            <div class="card-body p-5">
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <ul class="list-unstyled">
                                                            <li class="mb-2">
                                                                <b>ID</b>  #<?php echo $patients['id']; ?>
                                                            </li>
                                                        </ul>
                                                        <div class="text-black">
                                                            <b>Name:</b> <?php echo $patients['name']; ?>
                                                        </div>       
                                                        <div class="text-black">
                                                            <b>Email:</b> <?php echo $patients['email']; ?>
                                                        </div>    
                                                        <div class="text-black">
                                                            <b>Phone:</b> <?php echo $patients['phone']; ?>
                                                        </div>     
                                                        <div class="text-black">
                                                            <b>Role:</b> <?php echo $patients['role']; ?>
                                                        </div>                  
                                                    </div>
                                                    
                                                    <div class="col-sm-2">
                                                        <a class="btn btn-success btn-sm mb-2 d-grid" href="user/promote?id=<?php echo $patients['id']; ?>">Promote to Staff</a>
                                                        <a class="btn btn-danger btn-sm mb-2 d-grid" href="user/delete?id=<?php echo $patients['id']; ?>">Delete User</a>  
                                                    </div>
                                                </div>                                              
                                            </div>
                                        </div>
                                    <?php endforeach; ?> 
                                    <?php endif; ?> 
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
