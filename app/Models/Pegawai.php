<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function provinsi(){
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function kabupaten(){
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function kecamatan(){
        return $this->belongsTo(District::class, 'district_id');
    }

    public function kelurahan(){
        return $this->belongsTo(Village::class, 'village_id');
    }
}
