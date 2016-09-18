<?php

use Illuminate\Database\Seeder;

class Food extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food = [
            'قرمه سبزی' => 12500,
            'نوشابه' => 1200,
            'کوبیده' => 13000,
        ];

        foreach ($food as $key => $value) {
            DB::table('food')->insert([
                'name' => $key,
                'price' => $value,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => null,
            ]);
        }
    }
}
