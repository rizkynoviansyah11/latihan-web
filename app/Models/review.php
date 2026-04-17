<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'atraction_id',       
        'Nama',
        'Atraksi',
        'Komentar',
    ];
   public function atraction()
    {
        return $this->belongsTo( Atraction::class);
    }
}
