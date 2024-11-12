<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolUser extends Model
{
    use HasFactory;

    protected $table = 'school_users'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'school_id', 'first_name', 'last_name', 'email', 'password', 'role', 'gender', 
        'phone_number', 'address', 'date_of_birth'
    ];

    // Relationship: A user belongs to a school
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // Relationship: A user can have many students (e.g. Teachers)
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}