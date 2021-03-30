<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 2; $i <= 10; $i++) {
            $data [] = [
                'name' => 'Рейс №' . $i,
                'airline' => 1000 + $i,
            ];
        }
        DB::table('flights')->insert($data);
    }
}
