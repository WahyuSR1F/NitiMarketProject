<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $keyType = 'string';

    protected $fillable = ['id','nama','slug','deskripsi', 'status'];
}
