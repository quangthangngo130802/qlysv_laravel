<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;
    protected $table = 'tbl_passwordresettoken';
    // protected $primaryKey = 'o';
    public $timestamps = false;
    protected $fillable = ['email', 'token', 'created_at'];
    public function user(){
        return $this->hasOne(StudentAccount::class, 'email', 'email');
    }

}
