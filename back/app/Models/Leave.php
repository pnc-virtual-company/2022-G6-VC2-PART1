<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable=['student_id','start_date','end_date','duration','reason','leave_type','status'];
    public function students(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
