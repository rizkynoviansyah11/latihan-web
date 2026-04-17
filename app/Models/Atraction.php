<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Atraction extends Model
{
    protected $fillable = [
        'destination_id',
        'name', 
        'description'
    ];

    public function destination()
    {
        return $this->belongsTo( related: Destination::class);
    }

    public function review()
    {
        return $this->hasMany( related: Review::class);
    }
}
