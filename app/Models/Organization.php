<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'phone', 'email'];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    public function news() {
        return $this->hasMany(News::class);
    }

}
