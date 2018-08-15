<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'mail',
        'phone',
        'address'
    ];

    protected $hidden = [ 'token' ];
}
