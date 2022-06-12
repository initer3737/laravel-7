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
       DB::table('blogs')->insert([
        for ($i=0; $i < ; $i++) { 
            # code...
        }
       ]);
    }
}
