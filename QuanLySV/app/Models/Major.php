<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'tbl_major';
    protected $primaryKey = 'major_id';
    public $timestamps = false;
    protected $fillable = ['major_code', 'major_name', 'faculty_id'];
}
