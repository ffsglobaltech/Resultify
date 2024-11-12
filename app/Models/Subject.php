<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'name', 'code', 'class_id'
    ];

    // Relationship: A subject belongs to a class
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
