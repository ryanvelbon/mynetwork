<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $casts = [
        'hobbies' => 'array',
        'skills' => 'array',
    ];

    protected $fillable = [
        'name',
        'category_id',
        'country_id',
        'city_id',
        'sex',
        'dob', 
        'phone',
        'email',
        'religion_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }
}
