<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'featuredable_id', 'featuredable_type'];

    public function featuredable(){
        return $this->morphTo();
    }
}
