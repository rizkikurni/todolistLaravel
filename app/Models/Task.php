<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'tugas',
    //     'deskripsi',
    //     'eksekusi',
    // ];

    protected $guarded = ['id'];

    // ini adalah untuk mengubah parameter id menjadi sesuai yang di inginkan
    public function getRouteKeyName()
    {
        return 'tugas';
    }

    public function author(){
        return $this->belongsTo('user_id', User::class);
    }
}
