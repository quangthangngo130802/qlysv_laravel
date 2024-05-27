<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $table = 'tbl_term';
    protected $primaryKey = 'term_id';
    public $timestamps = false;
    protected $fillable = ['on_off', 'name'];

}
