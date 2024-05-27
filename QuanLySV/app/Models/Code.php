<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $table = 'tbl_code';
    protected $primaryKey = 'code_id';
    public $timestamps = false;
    protected $fillable = ['on_off', 'year', 'semester', 'time', 'end_date', 'start_date'];

}
