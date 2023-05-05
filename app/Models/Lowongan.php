<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelamar(){
        return $this->hasMany(Pelamar::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('posisi', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['closed'] ?? false, function ($query, $closed) {
            if($closed == true){
                return $query->where('tanggal', '<', now()->toDateString());;
            }
        });

        $query->when($filters['orderBy'] ?? false, function ($query, $orderBy) {
            return $query->orderBy('tanggal', $orderBy)->where('tanggal', '>', now()->toDateString());
        });
    }
}
