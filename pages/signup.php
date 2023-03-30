<?php
if ( Authentication::isLoggedIn() )
{
    header('Location: /profile');
    exit;
}


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

        // assign the user data to $_SESSION['user'] data
        Authentication::setSession( $user_id );

        header('Location: /profile');
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
        <title>MedicalCare - Signup</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/css/styles.css" rel="stylesheet" />
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
        <?php // require dirname(__DIR__) . '/models/header.php';?>
    
        <!-- login section-->
        <section class="py-5">
            <div class="container mt-5 pt-5" style="max-width: 500px;">
            <div class="row justify-content-center mb-4">
                    <img src="assets/logo.png" class="w-25">
            </div>
                <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-login" href="login" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-register" href="#" role="tab"
                aria-controls="pills-register" aria-selected="false">Sign Up</a>
            </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <?php require dirname( __DIR__ ) . '/models/error_box.php'; ?>
                    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" class="form-control" required />
                        <label class="form-label" for="name">Name</label>
                    </div>

                    <!-- DOB input -->
                    <div class="row mb-4">
                        <div class="col ms-3">
                            <label class="form-label" for="dob">Date of Birth</label>
                        </div>
                        <div class="col">
                            <input type="date" name="dob" class="form-control" required/>
                        </div>
                    </div>

                    <!-- NRIC input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="nric" class="form-control" required/>
                        <label class="form-label" for="nric">NRIC</label>
                    </div>

                    <!-- Phone input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="phone" class="form-control" required/>
                        <label class="form-label" for="phone">Phone Number</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control" required/>
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="confirm_password" class="form-control" />
                        <label class="form-label" for="confirm_password">Repeat password</label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" required
                        aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                        I have read and agree to the terms of service
                        </label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">Sign Up</button>
                    </form>
                </div>
            </div>
            <!-- Pills content -->

            </div>
            
        </section>
        
        <!-- Footer-->
        <?php // require dirname(__DIR__) . '/models/footer.php';?>
        <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
        ></script>
    </body>
</html>
