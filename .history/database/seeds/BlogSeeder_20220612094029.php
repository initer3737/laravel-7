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
                'name'=>,
                'address');
                'age');
                'telp');
                'hobby');
                'job');
            ]);
        }
    }
}
