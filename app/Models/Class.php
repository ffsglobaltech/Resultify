<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'name', 'description', 'teacher_id'
    ];

    // Relationship: A class can have many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Relationship: A class belongs to a teacher
    public function teacher()
    {
        return $this->belongsTo(SchoolUser::class, 'teacher_id');
    }
}