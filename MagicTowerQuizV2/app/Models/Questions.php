<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $primaryKey = 'id';
    
    protected $fillable = ['question', 'ans0','ans1','ans2','ans3','correct'];

    public $timestamps = false;
}
