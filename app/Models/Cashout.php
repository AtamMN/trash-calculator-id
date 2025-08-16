<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashout extends Model
{
    protected $fillable = ['trash_id', 'qty', 'subtotal', 'total'];

    public function trash()
    {
        return $this->belongsTo(Trash::class);
    }
}
