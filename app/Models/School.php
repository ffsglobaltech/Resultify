<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = true; // Timestamps enabled

    protected $fillable = [
        'name', 'short_name', 'domain', 'logo_path', 'motto', 'address', 'subdomain', 
        'country', 'state', 'city', 'contact_email', 'contact_phone'
    ];

    // Relationship: A school can have many users
    public function users()
    {
        return $this->hasMany(SchoolUser::class);
    }
}