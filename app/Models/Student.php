<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'school_user_id', 'first_name', 'last_name', 'email', 'gender', 'dob', 'address',
        'phone_number', 'class_id', 'parent_id'
    ];

    // Relationship: A student belongs to a school user (typically a teacher or principal)
    public function schoolUser()
    {
        return $this->belongsTo(SchoolUser::class, 'school_user_id');
    }

    // Relationship: A student can have many attendance records
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // Relationship: A student can have many report cards
    public function reportCards()
    {
        return $this->hasMany(ReportCard::class);
    }
}
