<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model of log
 */
class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = ['log_text'];
}
