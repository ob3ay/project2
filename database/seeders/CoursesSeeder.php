<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=1;$i<=20;$i++){
            DB::table('courses')->insert([
                'title'=>'Coures name'.$i,
                'category'=>'Coures-Category',
                'slug'=>'Coures-name'.$i,
                'description'=>'lorem..........',
                'image'=>'https\obay',
                'price'=>$i
            ]);
        }
    }
}
