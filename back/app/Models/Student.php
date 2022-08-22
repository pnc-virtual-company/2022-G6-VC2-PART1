<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable=['name','class_room','gender','email','password','remember_token'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function leaves(){
        $this->hasMany(Leave::class,'student_id');
    }
}
