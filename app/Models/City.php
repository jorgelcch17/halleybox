<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name','cost'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function districts(){
        return $this->hasMany(District::class);
    }
}
