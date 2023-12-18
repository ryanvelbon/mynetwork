<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
