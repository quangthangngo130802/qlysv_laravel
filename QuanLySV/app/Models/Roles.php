<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'tbl_roles';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
    protected $fillable = ['role_name'];

}
