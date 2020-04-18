<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'استراحة',
        ]);

        DB::table('types')->insert([
            'name' => 'شاليه',
        ]);

        DB::table('types')->insert([
            'name' => 'منتجع',
        ]);

        DB::table('types')->insert([
            'name' => 'قاعة أفراح',
        ]);

        DB::table('types')->insert([
            'name' => 'ملعب كورة',
        ]);                        

    }
}