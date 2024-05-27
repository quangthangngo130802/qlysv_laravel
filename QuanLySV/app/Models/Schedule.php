<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'tbl_schedule';
    protected $primaryKey = 'schedule_id';
    public $timestamps = false;
    protected $fillable = ['start_end_date_id', 'classroom_id', 'schedule_time', 'schedule_day'];

    public function classroom(){
        return $this->hasOne(Classroom::class, 'classroom_id', 'classroom_id');
    }
}
