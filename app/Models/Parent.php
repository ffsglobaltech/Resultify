<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    protected $table = 'parents'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'address', 'student_id'
    ];

    // Relationship: A parent can have many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}