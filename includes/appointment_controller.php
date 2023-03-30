<?php

class Appointment
{
    // get apps
    public static function getAllAppointments()
    {
        return DB::connect()->select(
            'SELECT *, appointments.id as aid FROM appointments JOIN users on appointments.created_by = users.id ORDER BY appointments.id DESC',
            [],
            true
        );
    }

    // get apps by user
    public static function getAppointments( $user_id )
    {
        return DB::connect()->select(
            'SELECT *, appointments.id as aid, u1.name as pd, u2.name as ad FROM appointments LEFT JOIN users u1 on appointments.preferred_doctor = u1.id LEFT JOIN users u2 on appointments.assigned_to = u2.id WHERE created_by  = :user_id ORDER BY appointments.id DESC',
            [
                'user_id' => $user_id
            ],
            true
        );
    }

    // get apps by id
    public static function getAppointmentByID( $appointment_id )
    {
        return DB::connect()->select(
            'SELECT *, u1.name as pd, u2.name as ad FROM appointments LEFT JOIN users u1 on appointments.preferred_doctor = u1.id LEFT JOIN users u2 on appointments.assigned_to = u2.id WHERE appointments.id = :id LIMIT 1',
            [
                'id' => $appointment_id
            ]
        );
    }

    // get apps by doc_id
    public static function getAppointmentByDoctorId( $doc_id )
    {
        return DB::connect()->select(
            'SELECT *, appointments.id as aid FROM appointments JOIN users on appointments.created_by = users.id WHERE assigned_to = :assigned_to ORDER BY appointments.id DESC',
            [
                'assigned_to' => $doc_id
            ],
            true
        );
    }

    // add apps
    public static function add( $created_by, $title, $message, $service, $preferred_doctor = null, $status )
    {
        return DB::connect()->insert(
            'INSERT INTO appointments (created_by, created_on, title, message, service, preferred_doctor, status) 
            VALUES (:created_by, :created_on, :title, :message, :service, :preferred_doctor, :status)',
            [
                'created_by' => $created_by,
                'created_on' => date('Y-m-d H:i:s'),
                'title' => $title,
                'message' => $message,
                'service' => $service,
                'preferred_doctor' => $preferred_doctor,
                'status' => $status
            ]
        );
    }

    // update apps
    public static function update( $created_by, $title, $message, $service, $preferred_doctor = null, $status )
    {

        return DB::connect()->update(
            'UPDATE appointments SET 
            created_by = :created_by, title = :title, message = :message, service = :service, preferred_doctor = :preferred_doctor, status = :status
            WHERE id = :id',
            [
                'created_by' => $created_by,
                'created_on' => date('Y-m-d H:i:s'),
                'title' => $title,
                'message' => $message,
                'service' => $service,
                'preferred_doctor' => $preferred_doctor,
                'status' => $status
            ]
        );
    }

    // change to complete or cancel
    public static function updateStatus( $id, $status )
    {
        return DB::connect()->update(
            'UPDATE appointments SET 
            status = :status 
            WHERE id = :id',
            [
                'id' => $id,
                'status' => $status
            ]
        );
    }

    // assign a doc
    public static function assignDoctor( $id, $doctor_id, $datetime )
    {
        return DB::connect()->update(
            'UPDATE appointments SET 
            assigned_to = :assigned_to, schedule_on = :schedule_on  
            WHERE id = :id',
            [
                'assigned_to' => $doctor_id,
                'schedule_on' => $datetime,
                'id' => $id
            ]
        );
    }

    // delete apps
    public static function delete( $post_id )
    {
        return DB::connect()->delete(
            'DELETE FROM appointments where id = :id',
            [
                'id' => $post_id
            ]
        );
    }
    
    // helpers for stats count (staff)
    public static function getTotalAppointments()
    {
        return DB::connect()->select(
            'SELECT COUNT(DISTINCT id) as total FROM appointments',
            []
        );
    }

    public static function getNoAppointments($status)
    {
        return DB::connect()->select(
            'SELECT COUNT(DISTINCT id) as total FROM appointments WHERE status = :status',
            [
                'status' => $status
            ]
        );
    }
    // helpers for stats count (staff)

    // helpers for stats count (doctor)
    public static function getTotalDocAppointments($doctor_id)
    {
        return DB::connect()->select(
            'SELECT COUNT(DISTINCT id) as total FROM appointments WHERE assigned_to = :assigned_to',
            [
                'assigned_to' => $doctor_id
            ]
        );
    }

    public static function getNoDocAppointments($status, $doctor_id)
    {
        return DB::connect()->select(
            'SELECT COUNT(id) as total FROM appointments WHERE status = :status AND assigned_to = :assigned_to',
            [
                'status' => $status,
                'assigned_to' => $doctor_id
            ]
        );
    }
    // helpers for stats count (staff)
}