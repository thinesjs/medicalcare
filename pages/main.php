<?php
$user = User::getUserByID( $_SESSION['user']['id'] );

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
        <title>MedicalCare - Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" 
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" 
        crossorigin="anonymous"
        />
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
        <?php require dirname(__DIR__) . '/models/header.php';?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">When you need answers, you know where to go.</h1>
                            <p class="lead text-white-50 mb-4">All of our patient care, education and research are driven to make discoveries that can help heal you.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#appointment">Make An Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-heart-pulse-fill"></i></div>
                        <h2 class="h4 fw-bolder">More experience</h2>
                        <p>The million patients we treat each year prepares us to treat the one who matters most — you.</p>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person-heart"></i></div>
                        <h2 class="h4 fw-bolder">The right answers</h2>
                        <p>Count on our experts to deliver an accurate diagnosis and the right plan for you the first time.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">You come first</h2>
                        <p>Treatment at MedicalCare is a truly human experience. You're cared for as a person first.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials section-->
        <section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Customer testimonials</h2>
                    <p class="lead mb-0">Our customers love working with us</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- Testimonial 1-->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">“I feel like the team really cares about my personal health and feels invested in my well-being into the future.” </p>
                                        <div class="small text-muted">- Paul Henderson, Malaysia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 2-->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">"I just can’t say enough good things about MedicalCare. I am so happy to be a patient there." </p>
                                        <div class="small text-muted">- Kevin Patterson, Malaysia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 1-->
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">“"It helped me to improve my health in every possible way. Nothing was overlooked." ” </p>
                                        <div class="small text-muted">- Abdul Rahman, Malaysia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section class="py-5" id="appointment">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h2 class="fw-bolder">Consult Now!</h2>
                    <p class="lead mb-0">We'd love to see you! <?php if ( !Authentication::whoCanAccess('user') ) : ?>Become a member and book<?php else: ?>Book<?php endif; ?> an appointment now for free!</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <?php if ( Authentication::whoCanAccess('user') ) : ?>
                        <div class="col-lg-6">
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
                                    <option value="">-</option>
                                    <?php foreach( User::getAllDoctors() as $doctor ) : ?>
                                        <option value="<?php echo $doctor['id']; ?>">Dr. <?php echo $doctor['name']; ?></option>
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
        </section>
        <!-- Footer-->
        <?php require dirname(__DIR__) . '/models/footer.php';?>
    </body>
</html>
