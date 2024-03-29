<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['student_id','code','title'];
    use HasFactory;

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
