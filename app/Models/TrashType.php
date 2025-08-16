<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashType extends Model
{
    use HasFactory;

    protected $table = 'trash_types'; // nama tabel di database
    protected $fillable = ['name', 'desc', 'price', 'img'];
}
