<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MedicalCare - Services</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
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
    <body class="d-flex flex-column min-vh-100 bg-light">
        <!-- navbar -->
        <?php require dirname(__DIR__) . '/models/header.php';?>
    
        <!-- whoweare section-->
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                    
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-heart-pulse-fill"></i></div>
                <h2 class="h4 fw-bolder">SERVICES AND TREATMENTS</h2>
                <p>The services offered by our clinic can vary widely, too. Some types of clinics offer a broad range of healthcare services while others provide specialized care. 
                <br>With branches in Bangsar Baru, Taman Tun Dr Ismail, Mont Kiara and Puchong, as well as in KL City, we are strategically located to serve you.</p>
                    
            </div>
        </section>
        <!-- values section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Our Services</h2>
                    <p class="lead mb-0">We provide a wide range of services to our patients to feel better!R</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- 1 -->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold mb-3">BIRTHING CARE</div>

                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                    Carers during pregnancy, labour and birth may include midwives, your general practitioner, an obstetrician or a combination of all three.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold mb-3">CANCER CARE</div>

                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                    Some people with cancer will have only one treatment. But most people have a combination of treatments, such as surgery with chemotherapy and radiation therapy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold mb-3">EMERGENCIES</div>

                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                    The Accident and Emergency department (A&E) at MedicalCare is available 24/7 with 24-hour Ambulance Services and a multidisciplinary team of specialists
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>        
        <!-- Footer-->
        <?php require dirname(__DIR__) . '/models/footer.php';?>
    </body>
</html>
