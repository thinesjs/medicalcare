<?php 
    session_start();

    // init all the classes & functions files
    require "includes/db_init.php";
    require "includes/authentication.php";
    require "includes/user_controller.php";
    require "includes/appointment_controller.php";


    // get route
    $path = trim( $_SERVER["REQUEST_URI"], '/' );
    $path = parse_url( $path, PHP_URL_PATH );


    // assign route
    switch( $path ) {
        // global and user routes
        case 'login':
            require 'pages/login.php';
            break;
        case 'signup':
            require 'pages/signup.php';
            break;
        case 'logout':
            require 'pages/logout.php';
            break;
        case 'about':
            require 'pages/about.php';
            break;
        case 'profile':
            require 'pages/user/profile.php';
            break;
        case 'profile/edit':
            require 'pages/user/profile-update.php';
            break;
        case 'appointments':
            require 'pages/user/appointments.php';
            break;
        case 'appointment/new':
            require 'pages/user/new-appointment.php';
            break;
        case 'appointment/view':
            require 'pages/user/view-appointment.php';
            break;
        case 'appointment/cancel':
            require 'pages/user/cancel-appointment.php';
            break;
        case 'services':
            require 'pages/services.php';
            break;
        // doctor routes
        case 'doctor/profile':
            require 'pages/doctor/profile.php';
            break;
        case 'doctor/home':
            require 'pages/doctor/home.php';
            break;
        case 'doctor/appointments':
            require 'pages/doctor/appointments.php';
            break;
        case 'doctor/appointment/view':
            require 'pages/doctor/view-appointment.php';
            break;
        case 'doctor/appointment/complete':
            require 'pages/doctor/complete-appointment.php';
            break;
        case 'doctor/appointment/cancel':
            require 'pages/doctor/cancel-appointment.php';
            break;
        // staff routes
        case 'staff/home':
            require 'pages/staff/home.php';
            break;
        case 'staff/appointments':
            require 'pages/staff/appointments.php';
            break;
        case 'staff/appointment/view':
            require 'pages/staff/view-appointment.php';
            break;
        case 'staff/appointment/assign':
            require 'pages/staff/assign-appointment.php';
            break;
        case 'staff/appointment/complete':
            require 'pages/staff/complete-appointment.php';
            break;
        case 'staff/appointment/cancel':
            require 'pages/staff/cancel-appointment.php';
            break;
        // admin routes
        case 'admin/dashboard':
            require 'pages/admin/dashboard.php';
            break;
        case 'admin/appointments':
            require 'pages/admin/appointments.php';
            break;
        case 'admin/appointment/view':
            require 'pages/admin/view-appointment.php';
            break;
        case 'admin/appointment/assign':
            require 'pages/admin/assign-appointment.php';
            break;
        case 'admin/appointment/complete':
            require 'pages/admin/complete-appointment.php';
            break;
        case 'admin/appointment/cancel':
            require 'pages/admin/cancel-appointment.php';
            break;
        case 'admin/users':
            require 'pages/admin/manage-users.php';
            break;
        case 'admin/nurses':
            require 'pages/admin/manage-nurses.php';
            break;
        case 'admin/doctors':
            require 'pages/admin/manage-doctors.php';
            break;
        case 'admin/user/delete':
            require 'pages/admin/delete-user.php';
            break;
        case 'admin/user/promote':
            require 'pages/admin/promote-staff.php';
            break;
        case 'admin/nurse/promote':
            require 'pages/admin/promote-doctor.php';
            break;
        case 'admin/nurse/demote':
            require 'pages/admin/demote-user.php';
            break;
        case 'admin/doctor/demote':
            require 'pages/admin/demote-doctor-user.php';
            break;
        case 'admin/doctor/demote-staff':
            require 'pages/admin/demote-staff.php';
            break;
        case 'admin/user/new':
            require 'pages/admin/add-user.php';
            break;
        // main routes
        case '':
            require 'pages/main.php';
            break;
        default:
            require 'pages/404.php';
            break;
    }

