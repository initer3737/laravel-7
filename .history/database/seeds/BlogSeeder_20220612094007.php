<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <100 ; $i++) { 
            DB::table('blogs')->insert([
                $table->string('name');
                $table->string('address');
                $table->string('age');
                $table->string('telp');
                $table->string('hobby');
                $table->string('job');
            ]);
        }
    }
}
