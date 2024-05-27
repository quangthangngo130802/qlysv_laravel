<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeTerm extends Model
{
    use HasFactory;
    protected $table = 'tbl_code_term';
    protected $primaryKey = 'code_term_id';

    public function code(){
        return $this->belongsTo(Code::class, 'code_id', 'code_id');
    }
    public function term(){
        return $this->belongsTo(Term::class, 'term_id', 'term_id');
    }
}
