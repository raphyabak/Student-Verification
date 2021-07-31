<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['surname', 'other_names', 'image', 'sex', 'matric_no', 'status', 'faculty', 'department', 'programme', 'level', 'year_admit'];

    use HasFactory;
}
