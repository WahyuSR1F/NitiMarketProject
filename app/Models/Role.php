<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles'; // opsional jika nama class == nama tabel (plural)

    protected $fillable = ['role'];
    protected $keyType = 'string';

    // Relasi ke User (satu role bisa punya banyak user)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
