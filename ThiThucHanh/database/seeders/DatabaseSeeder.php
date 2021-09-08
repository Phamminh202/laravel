<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('furniture')->insert([
            [
                'product_code'=>'TD201',
                'name'=>'Wardrobe',
                'price'=>'2000000',
                'avatar'=>'tuquanao.jpg',
            ] ,
            [
                'product_code'=>'AC152',
                'name'=>'Bed',
                'price'=>'3999000',
                'avatar'=>'giuongngu.jpg',
            ] ,[
                'product_code'=>'ET584',
                'name'=>'Cabinet in front of bed',
                'price'=>'1500000',
                'avatar'=>'tudaugiuong.jpg',
            ] ,[
                'product_code'=>'DH332',
                'name'=>'Kitchen Cabinets',
                'price'=>'10000000',
                'avatar'=>'tubep.jpg',
            ] ,
        ]);
    }
}
