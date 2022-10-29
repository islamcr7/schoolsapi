<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professors';

    protected $fillable = [
		'firstName',
		'lastName',
        'sex',
        'profession',
		'address',
		'phoneNumber1',
        'phoneNumber2',
        'mail',
        'birthDate'

	];
}
