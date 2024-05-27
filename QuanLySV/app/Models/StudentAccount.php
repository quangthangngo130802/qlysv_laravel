<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_student_account';
    protected $primaryKey = 'student_account_id';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'student_id'
    ];

    public function student(){
        return $this->hasOne(Student::class, 'student_id', 'student_id');
    }
}
