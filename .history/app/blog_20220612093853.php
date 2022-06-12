<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table='blogs';
    protected $fillable=[
        $taDble->string('name');
            $table->string('address');
            $table->string('age');
            $table->string('telp');
            $table->string('hobby');
            $table->string('job');
    ];
}
