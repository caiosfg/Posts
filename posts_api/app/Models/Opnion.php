<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opnion extends Model
{
    /** @use HasFactory<\Database\Factories\OpnionFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
