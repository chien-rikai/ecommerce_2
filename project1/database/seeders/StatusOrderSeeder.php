<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_orders')->insert(
            [
                ['status' => 'shipping'],
                ['status' => 'cancelled'],
                ['status' => 'processing'],
                ['status' => 'completed']
            ]
            );
    }
}
