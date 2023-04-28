<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where(function ($query) use ($status) {
                $query->where('status', $status);
            });
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('user', function($query) use ($search){
                $query->where('nik', 'like', '%' . $search . '%')
                ->orwhere('nama', 'like', '%' . $search . '%');
            });
        });
    }
}
