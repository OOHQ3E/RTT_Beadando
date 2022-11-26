<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;
    protected $table = 'leaderboards';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'percentage', 'points', 'time', 'number_of_questions', 'points_per_minute'];
    public $timestamps = false;
}
