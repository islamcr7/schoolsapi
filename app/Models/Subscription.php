<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    use HasFactory;

    protected $fillable = [
		'slot_id',
		'student_id',
    ];
}
