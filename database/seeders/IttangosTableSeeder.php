<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class IttangosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ittangos')->insert(
            [
                [
                    'tango'=>'キュー',
                    'setumei'=>'要素を入ってきた順に一列に並べ、先に入れた要素から順に取り出すという規則で出し入れを行うもの。',
                    'kaisu'=>0,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                
            ]
            );
    }
}
