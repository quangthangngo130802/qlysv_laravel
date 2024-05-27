<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'tbl_classroom';
    protected $primaryKey = 'classroom_id';
    public $timestamps = false;
    protected $fillable = ['building_name', 'room_name', 'capacity'];
}
