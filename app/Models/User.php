<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'email',
    //     'password',
    //     'role',
    //     'nik',
    //     'jumlah_cuti',
    //     'email_verified_at'
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function presensi(){
        return $this->hasMany(Presensi::class);
    }

    public function cuti(){
        return $this->hasMany(Cuti::class);
    }

    public function perizinan(){
        return $this->hasMany(Perizinan::class);
    }

    public function resign(){
        return $this->hasMany(Resign::class);
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
    
    public function scopeFilter($query, array $filters)
    {
    $query->when($filters['search'] ?? false, function ($query, $search) {
        return $query->where(function ($query) use ($search) {
            $query->where('nik', 'like', '%' . $search . '%')
            ->orwhere('nama', 'like', '%' . $search . '%');
            });
        });
    }
}
