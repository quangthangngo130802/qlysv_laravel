<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'tbl_posts';
    protected $primaryKey = 'posts_id';
    public $timestamps = false;
    protected $fillable = ['posts_title', 'posts_content', 'admin_id', 'created_at', 'updated_at'];
}
