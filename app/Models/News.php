<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'organization_id', 'division_id'];

    public function organization() {
        return $this->belongsTo(Organization::class);
    }

    public function division() {
        return $this->belongsTo(Division::class);
    }

}
