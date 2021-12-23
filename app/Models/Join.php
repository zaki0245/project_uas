<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $fillable = ['actifity_id','name_id'];
    public function actifity(){
        return $this->belongsTo(Actifity::class, 'actifity_id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'name_id');
    }
}
    
