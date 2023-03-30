<?php

class User
{
    // get users based on roles
    public static function getAllUsers()
    {
        return DB::Connect()->select(
            'SELECT * FROM users ORDER BY id DESC',
            [],
            true
        );
    }

    public static function getAllDoctors()
    {
        return DB::Connect()->select(
            'SELECT * FROM users where role = :role ORDER BY id DESC',
            [
                'role' => 'doctor'
            ],
            true
        );
    }

    public static function getAllNurses()
    {
        return DB::Connect()->select(
            'SELECT * FROM users where role = :role ORDER BY id DESC',
            [
                'role' => 'staff'
            ],
            true
        );
    }

    public static function getAllPatients()
    {
        return DB::Connect()->select(
            'SELECT * FROM users where role = :role ORDER BY id DESC',
            [
                'role' => 'user'
            ],
            true
        );
    }
    // end - get users based on roles

    // user role helpers
    public static function promoteDoctor( $user_id )
    {
        return DB::connect()->delete(
            'UPDATE users SET role = :role where id = :id',
            [
                'id' => $user_id,
                'role' => 'doctor'
            ]
        );
    }

    public static function demoteUser( $user_id )
    {
        return DB::connect()->delete(
            'UPDATE users SET role = :role where id = :id',
            [
                'id' => $user_id,
                'role' => 'user'
            ]
        );
    }

    public static function demoteStaff( $user_id )
    {
        return DB::connect()->delete(
            'UPDATE users SET role = :role where id = :id',
            [
                'id' => $user_id,
                'role' => 'staff'
            ]
        );
    }

    public static function promoteStaff( $user_id )
    {
        return DB::connect()->delete(
            'UPDATE users SET role = :role where id = :id',
            [
                'id' => $user_id,
                'role' => 'staff'
            ]
        );
    }
    // end - user role helpers


    // get user by id
    public static function getUserById( $user_id )
    {
        return DB::connect()->select(
            'SELECT * FROM users WHERE id = :id',
            [
                'id' => $user_id
            ]
        );
    }

    // get doc by id
    public static function getDoctorById( $user_id )
    {
        return DB::connect()->select(
            'SELECT * FROM users WHERE id = :id AND role = :role',
            [
                'id' => $user_id,
                'role' => 'doctor'
            ]
        );
    }

    // add user
    public static function add( $name, $email, $role, $password )
    {
        return DB::connect()->insert(
            'INSERT INTO users (name , email, role, password) 
            VALUES (:name, :email, :role, :password)',
            [
                'name' => $name,
                'email' => $email,
                'role' => $role,
                'password' => password_hash( $password, PASSWORD_DEFAULT )
            ]
        );
    }

    // update user
    public static function update( $id, $name, $dob, $nric, $phone, $email, $blood_group, $diet, $allergy_info )
    {
        $params = [
            'id' => $id,
            'name' => $name,
            'dob' => $dob,
            'nric' => $nric,
            'phone' => $phone,
            'email' => $email,
            'blood_group' => $blood_group,
            'diet' => $diet,
            'allergy_info' => $allergy_info
        ];

        return DB::connect()->update(
            'UPDATE users SET name = :name, dob = :dob, nric = :nric, phone = :phone, email = :email, blood_group = :blood_group, diet = :diet, allergy_info = :allergy_info WHERE id = :id',
            $params
        );
    }

    // delete user
    public static function delete( $user_id )
    {
        return DB::connect()->delete(
            'DELETE FROM users where id = :id',
            [
                'id' => $user_id
            ]
        );
    }
}