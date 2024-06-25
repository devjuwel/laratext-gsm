<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'name',
        'email',
        'phone_number',
        'description',
    ];
}
