<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experts extends Model
{
    use HasFactory;
    protected $fillable = [
        'experts_categories_id',
        'contact_person_name',
        'email',
        'address',
        'mobile',
        'telephone',
        'whatsapp_number',
        'price',
        'title',
        'slug',
        'about',
        'working_hours',
        'description',
        'services',
        'starting_prices',
        'social_profile',
        'google_map',
        'ratings',
        'reviews',
        'website',
        'city',
        'country',
        'status',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'expert_image',
        'image_id',
    ];
}
