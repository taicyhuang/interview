<?php

use Illuminate\Database\Seeder;

class PlantingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('platings')->insert([
            'name' => '一般'
        ]);
        DB::table('platings')->insert([
            'name' => '三重'
        ]);
        DB::table('platings')->insert([
            'name' => 'CASS 27H'
        ]);
        DB::table('platings')->insert([
            'name' => 'CASS 32H'
        ]);
        DB::table('platings')->insert([
            'name' => 'CASS 40H'
        ]);
        DB::table('platings')->insert([
            'name' => 'CASS 42H'
        ]);
        DB::table('platings')->insert([
            'name' => 'CASS 44H'
        ]);
        DB::table('platings')->insert([
            'name' => 'CASS 46H'
        ]);
        DB::table('platings')->insert([
            'name' => 'CASS 48H'
        ]);
    }
}
