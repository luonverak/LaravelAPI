<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleModel extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'age',
        'address'
    ];
}
