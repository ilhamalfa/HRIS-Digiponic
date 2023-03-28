<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lamaran(){
        return $this->hasMany(Lamaran::class);
    }
}
