<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('author')->insert([
            'author_id' => 'k-0AUuoAAAAJ',
            'author_alias' => 'Van-Du Nguyen',
            'website' => 'http://tnut.edu.vn/',
            'work_place_name' =>  'Thai Nguyen University of Technology'
        ]);
    }
}
