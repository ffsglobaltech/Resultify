<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'short_name', 'domain', 'logo_path', 'motto', 'address', 'subdomain', 'country', 'state', 'city', 'contact_email', 'contact_phone'];

    public function users()
    {
        return $this->hasMany(SchoolUser::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}

