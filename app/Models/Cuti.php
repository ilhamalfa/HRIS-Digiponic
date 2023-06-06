<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user1(){
        return $this->belongsTo(User::class, 'user_id_1');
    }

    public function user2(){
        return $this->belongsTo(User::class, 'user_id_2');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where(function ($query) use ($status) {
                $query->where('status', $status);
            });
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('user', function($query) use ($search){
                $query->where('nik', 'like', '%' . $search . '%')
                ->orwhere('nama', 'like', '%' . $search . '%');
            });
        });
    }
}
