<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable = [
        'current_balance',
    ];
    public function t_archive(){
        return $this->hasMany(T_Archive::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
    public function manager(){
        return $this->hasOne(User::class,'manager_id');
    }
}
