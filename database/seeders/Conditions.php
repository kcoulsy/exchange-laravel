<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Conditions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Condition::updateOrCreate([
            'name' => 'New',
        ]);

        Condition::updateOrCreate([
            'name' => 'Used',
        ]);

        Condition::updateOrCreate([
            'name' => 'Manufacturer Refurbished',
        ]);

        Condition::updateOrCreate([
            'name' => 'Seller Refurbished',
        ]);

        Condition::updateOrCreate([
            'name' => 'For parts or not working',
        ]);

        Condition::updateOrCreate([
            'name' => 'N/A',
        ]);

        Condition::updateOrCreate([
            'name' => 'Clearance',
        ]);
    }
}