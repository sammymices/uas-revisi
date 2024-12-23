<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table="profiles"; // Eloquent akan membuat model mahasiswa
//menyimpan record di tabel mahasiswas
    public $timestamps= true;
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'id',
        'name',
        'address',
        'logo',
        'phone_number',
        'balance',
        'email',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'created_at',
        'updated_at',
    ];
}
