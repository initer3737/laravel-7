<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table='blogs';
    protected $fillable=[
            'name',
            'address',
            'file',
            'age',
            'telp',
            'hobby',
            'job'
    ];
}