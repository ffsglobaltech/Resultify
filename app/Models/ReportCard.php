<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
    use HasFactory;

    protected $table = 'report_cards'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'student_id', 'term', 'year', 'marks', 'grade'
    ];

    // Relationship: A report card belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}