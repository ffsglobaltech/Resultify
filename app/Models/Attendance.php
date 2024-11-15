<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'student_id', 'date', 'status'
    ];

    // Relationship: Attendance belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}