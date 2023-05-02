<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lowongan(){
        return $this->belongsTo(Lowongan::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where(function ($query) use ($status) {
                $query->where('status', $status);
            });
        });
    }
}
