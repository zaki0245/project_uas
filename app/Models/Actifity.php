<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actifity extends Model
{
    protected $table = "actifities";
    protected $fillable = ['actifity_name','place', 'date'];

    public function join(){
        return $this->hasMany(Join::class);
    }
}
