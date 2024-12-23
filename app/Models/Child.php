<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Child extends Model
{
    use HasFactory;
    protected $table="foster_children"; // Eloquent akan membuat model mahasiswa
//menyimpan record di tabel mahasiswas
    public $timestamps= true;
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'id',
        'name',
        'birthdate',
        'photo',
        'gender',
        'created_at',
        'updated_at',
    ];

}
