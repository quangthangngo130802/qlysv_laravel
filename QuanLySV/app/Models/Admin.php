<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'tbl_admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
    protected $fillable = ['admin_email', 'admin_password', 'admin_name', 'admin_phone', 'admin_avatar'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'tbl_admin_roles', 'admin_id', 'role_id');
    }

    public function getAuthPassword()
    {
        return $this->admin_password;
    }

    public function hasRole($role) // mảng
    {
        return null !== $this->roles()->whereIn('role_name', $role)->first();
    }


}
