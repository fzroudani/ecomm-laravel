<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id	num	price	type	description	cadre	measure	gallery	created_at	updated_at
        DB::table('products')->insert([
            [
                'num'=>'11',
                'price'=>'0',
                'type'=>'TableauCarre',
                'description'=>'.......................',
                'cadre'=>'avec cadre',
                'measure'=>"100x60",
                'gallery'=>"TableauxCarré/36.jpg"
            ],
            [
                'num'=>'11',
                'price'=>'0',
                'type'=>'TableauCarre',
                'description'=>'.......................',
                'cadre'=>'avec cadre',
                'measure'=>"130x80",
                'gallery'=>"TableauxCarré/36.jpg"
            ],
            [
                'num'=>'11',
                'price'=>'0',
                'type'=>'TableauCarre',
                'description'=>'.......................',
                'cadre'=>'sans cadre',
                'measure'=>"104x64",
                'gallery'=>"TableauxCarré/36.jpg"
            ],
            [
                'num'=>'11',
                'price'=>'0',
                'type'=>'TableauCarre',
                'description'=>'.......................',
                'cadre'=>'avec cadre',
                'measure'=>"134x84",
                'gallery'=>"TableauxCarré/36.jpg"
            ]
        ]);

    }
}
