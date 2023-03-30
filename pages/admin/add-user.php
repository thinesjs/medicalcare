<?php
if ( !Authentication::whoCanAccess('admin') ) {
    header('Location: /login');
    exit;
}

// load user data
$user = User::getUserByID( $_SESSION['user']['id'] );
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $nric = $_POST['nric'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = "user";

    $error = Authentication::checkEmailUniqueness( $email );
    if ( !$error ) {
        $user_id = Authentication::signup(
            $name, 
            $dob, 
            $nric, 
            $phone, 
            $email , 
            $password, 
            $role
        );

        header('Location: /admin/users');
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
        <title>MedicalCare - Admin - Add User</title>
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
                                class="nav-link"  
                                href="/admin/appointments"
                                role="tab"
                                >Appointments</a
                            >
                            <a class="text-muted text-start mt-3"><small>Site Management</small></a>
                            <li><hr class="dropdown-divider" /></li>
                            <a
                                class="nav-link active"
                                href="/admin/users"
                                role="tab"
                                aria-selected="false"
                                >Manage Users</a
                            >
                            <a
                                class="nav-link"
                                href="/admin/nurses"
                                role="tab"
                                aria-selected="false"
                                >Manage Nurses</a
                            >
                            <a
                                class="nav-link"
                                href="/admin/doctors"
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
                                    <a type="button" class="btn btn-md btn-primary " href="/admin/users">Back</a>
                                </div>
                                <div class="row">
                                <div class="card h-100 mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-3">
                                        <h2 class="fw-bolder">Add User</h2>
                                        <p class="lead">Enter the personal information of the new user!</p>
                                    </div>
                                    <div class="row">
                                        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                                            <ul class="list-unstyled">
                                                <!-- name -->
                                                <li class="mb-2">
                                                    <strong>Name</strong>
                                                </li>
                                                <li class="mb-2">
                                                    <div class="form-outline">
                                                        <input type="text" name="name" class="form-control" required/>
                                                        <label class="form-label" for="dob">Name</label>
                                                    </div>
                                                </li>

                                                <!-- dob -->
                                                <li class="mb-2">
                                                    <strong>Date of Birth</strong>
                                                </li>
                                                <li class="mb-2">
                                                    <div class="form-outline">
                                                        <input type="date" name="dob" class="form-control" required/>
                                                        <label class="form-label" for="dob">Date of Birth</label>
                                                    </div>
                                                </li>

                                                <!-- phone n nric -->
                                                <li class="mb-2">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                        <strong>NRIC</strong>
                                                            <div class="form-outline">
                                                                <input type="text" name="nric" class="form-control" required/>
                                                                <label class="form-label" for="dob">NRIC</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm">
                                                        <strong>Phone Number</strong>
                                                        <div class="form-outline">
                                                                <input type="tel" name="phone" class="form-control" required/>
                                                                <label class="form-label" for="dob">Phone Number</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- email -->
                                                <li class="mb-2">
                                                    <strong>Email</strong>
                                                </li>
                                                <li class="mb-2">
                                                    <div class="form-outline">
                                                        <input type="email" name="email" class="form-control" required/>
                                                        <label class="form-label" for="dob">Email</label>
                                                    </div>
                                                </li>

                                                <!-- password -->
                                                <li class="mb-2">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                        <strong>Password</strong>
                                                            <div class="form-outline">
                                                                <input type="text" name="password" class="form-control" required/>
                                                                <label class="form-label" for="dob">Password</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm">
                                                        <strong>Repeat Password</strong>
                                                        <div class="form-outline">
                                                                <input type="tel" name="confirm_password" class="form-control" required/>
                                                                <label class="form-label" for="dob">Repeat Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                
                                            </ul>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-sm btn-success">Add</a>
                                            </div> 
                                        </form>
                                         
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
