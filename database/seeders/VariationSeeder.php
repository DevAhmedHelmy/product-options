<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Variation;
use Illuminate\Database\Seeder;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $variations = [['name'=>'Colors','created_at' => $now,'updated_at'=>$now],['name'=>'Sizes','created_at' => $now,'updated_at'=>$now],['name'=>'Types','created_at' => $now,'updated_at'=>$now]];
        Variation::insert($variations);
        $variation_options = [
            ['name'=>'red','variation_id'=>1,'created_at' => $now,'updated_at'=>$now],['name'=>'black','variation_id'=>1,'created_at' => $now,'updated_at'=>$now],['name'=>'blue','variation_id'=>1,'created_at' => $now,'updated_at'=>$now],['name'=>'large','variation_id'=>2,'created_at' => $now,'updated_at'=>$now],['name'=>'medium','variation_id'=>2,'created_at' => $now,'updated_at'=>$now],['name'=>'small','variation_id'=>2,'created_at' => $now,'updated_at'=>$now],
            ['name'=>'Cotton','variation_id'=>3,'created_at' => $now,'updated_at'=>$now],['name'=>'Polyester','variation_id'=>3,'created_at' => $now,'updated_at'=>$now]
        ];
        Option::insert($variation_options);

    }
}
