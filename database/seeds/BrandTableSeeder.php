<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brand')->insert([
        //     'brand_name' => Str::random(10),
        //     'brand_logo' => Str::random(10),
        //     'brand_url'=>Str::random(10),
        //     'created_at'=>date('Y-m-d H:i:s')
        //     ]);

        factory(App\Models\Brand::class, 50)->create();

    }
}
