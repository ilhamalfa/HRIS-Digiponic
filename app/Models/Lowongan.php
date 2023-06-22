<?php

namespace App\Models;

use Carbon\Carbon;
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

        $query->when($_GET['orderBy'] ?? false, function ($query, $orderBy) {
            if ($orderBy == 'asc') {
                $query->orderBy('id', $orderBy);
            } elseif ($orderBy == 'desc') {
                $query->orderBy('id', $orderBy);
            } elseif ($orderBy == 'deadline') {
                $query->whereDate('tanggal', '<', Carbon::now())->orderBy('tanggal', 'asc');
            }
        });
    }
}
