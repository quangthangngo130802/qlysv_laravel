<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'tbl_faculty';
    protected $primaryKey = 'faculty_id';
    public $timestamps = false;
    protected $fillable = ['faculty_code', 'faculty_name'];
}
