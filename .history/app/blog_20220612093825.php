<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
$table->string('name');
            $table->string('address');
            $table->string('age');
            $table->string('telp');
            $table->string('hobby');
            $table->string('job');
class blog extends Model
{
    protected $table='blogs';
    protected $fillable=[];
}
