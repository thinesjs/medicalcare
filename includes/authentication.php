<?php

class Authentication
{

    public static function checkEmailUniqueness( $email )
    {
        // check if email already used by another user
        $user = DB::connect()->select(
            'SELECT * FROM users where email = :email',
            [
                'email' => $email
            ]
        );

        // if user with the same email is already exists
        if ( $user ) {
            return 'Email is already in-use';
        }

        return false;
    }

    // login 
    public static function login( $email, $password )
    {
        $user_id = false;

        $user = DB::connect()->select(
            'SELECT * FROM users where email = :email',
            [
                'email' => $email
            ]
        );

        if ( $user ) {
            if ( password_verify( $password, $user['password'] ) ) {
                $user_id = $user['id'];
            }
        }

        // get user id in return
        return $user_id;
    }

    // register
    public static function signup( $name, $dob, $nric, $phone, $email, $password, $role )
    {

        return DB::connect()->insert(
            'INSERT INTO users (name, dob, nric, phone, email, password, role)
            VALUES (:name, :dob, :nric, :phone, :email, :password, :role)',
            [
                'name' => $name,
                'dob' => $dob,
                'nric' => $nric,
                'phone' => $phone,
                'email' => $email,
                'password' => password_hash( $password, PASSWORD_DEFAULT ),
                'role' => $role,
            ]
        );

    }

    // logout
    public static function logout()
    {
        unset( $_SESSION['user'] );
    }

    // isloggedin middleware
    public static function isLoggedIn() 
    {
        return isset( $_SESSION['user'] );
    }

    // set session
    public static function setSession( $user_id )
    {
        // load the user data from database based on userid
        $user = DB::connect()->select(
            'SELECT * from users where id = :id',
            [
                'id' => $user_id
            ]
        );

        // assign it to $_SESSION['user']
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role']
        ];
    }

    // get role
    public static function getRole()
    {
        if ( self::isLoggedIn() ) {
            return $_SESSION['user']['role'];
        }
        return false;
    }

    // user roles
    public static function isAdmin()
    {
        return self::getRole() == 'admin';
    }

    public static function isDoctor()
    {
        return self::getRole() == 'doctor';
    }

    public static function isStaff()
    {
        return self::getRole() == 'staff';
    }

    public static function isUser()
    {
        return self::getRole() == 'user';
    }
    // end - user roles

    // user role gate
    public static function whoCanAccess( $role )
    {
        if ( self::isLoggedIn() ) {
            switch( $role ) {
            case 'admin':
                return self::isAdmin();
            case 'doctor':
                return self::isDoctor()|| self::isAdmin();
            case 'staff':
                return self::isStaff() || self::isDoctor() || self::isAdmin();
            case 'user' :
                return self::isUser() || self::isStaff() || self::isDoctor() || self::isAdmin();
            }
        } 
        return false;
    }
}