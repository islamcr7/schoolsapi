<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $table = 'slots';
    
    protected $fillable = [
		'module_id',
		'prof_id',
        'slots_number',
        'fee',
	];
}
