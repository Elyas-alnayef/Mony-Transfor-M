<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Archive extends Model
{
    use HasFactory;
    protected $fillable = [
        'deleted'
    ];
    public function t_point(){
        return $this->belongsTo(Point::class,'sender_id');
    } 
    public function user(){
        return $this->belongsTo(User::class);
    } 
    public function receiver()
    {
        return $this->belongsTo(Point::class, 'receiver_id'); // Adjust the foreign key column if needed
    }
}
