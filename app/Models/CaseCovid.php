<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseCovid extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'today_cases', 'total_cases'];
}
