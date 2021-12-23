<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // use HasFactory;
    protected $table = "members";
    protected $fillable = ['nim','name', 'class', 'department', 'photo', 'phone_number'];

    public function join(){
        return $this->hasMany(Join::class);
    }
}
