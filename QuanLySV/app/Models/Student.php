<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $table = 'tbl_student';
    protected $primaryKey = 'student_id';
    public $timestamps = false;
    protected $fillable = ['student_code', 'first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'email', 'phone', 'student_avatar', 'class_id'];

    public function class(){
        return $this->hasOne(Classs::class, 'class_id', 'class_id')->with('course', 'major')->with('course');
    }

    public function grades(){
        return $this->hasMany(Grades::class, 'student_id', 'student_id')->with('gradesDetail');
    }
}
