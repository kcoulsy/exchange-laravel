<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::updateOrCreate([
            'name' => 'Sheet Metal Machinery',
            'slug' => Str::slug('Sheet Metal Machinery')
        ]);
        Category::updateOrCreate([
            'name' => 'Woodworking Machinery',
            'slug' => Str::slug('Woodworking Machinery')
        ]);
        Category::updateOrCreate([
            'name' => 'Agricultural Machinery',
            'slug' => Str::slug('Agricultural Machinery')
        ]);
        Category::updateOrCreate([
            'name' => 'Welding Equipment',
            'slug' => Str::slug('Welding Equipment')
        ]);
        Category::updateOrCreate([
            'name' => 'Hand Tools',
            'slug' => Str::slug('Hand Tools')
        ]);
        Category::updateOrCreate([
            'name' => 'CNC Machinery',
            'slug' => Str::slug('CNC Machinery')
        ]);
        Category::updateOrCreate([
            'name' => 'Construction',
            'slug' => Str::slug('Construction')
        ]);
        Category::updateOrCreate([
            'name' => 'Power Generation',
            'slug' => Str::slug('Power Generation')
        ]);
        Category::updateOrCreate([
            'name' => 'Metal Fabrication Machinery',
            'slug' => Str::slug('Metal Fabrication Machinery')
        ]);
        Category::updateOrCreate([
            'name' => 'Plastics Machinery',
            'slug' => Str::slug('Plastics Machinery')
        ]);
        Category::updateOrCreate([
            'name' => 'Factory Equipment',
            'slug' => Str::slug('Factory Equipment')
        ]);
        Category::updateOrCreate([
            'name' => 'Industrial Supply / MRO',
            'slug' => Str::slug('Industrial Supply / MRO')
        ]);
        Category::updateOrCreate([
            'name' => 'Commercial Vehicles',
            'slug' => Str::slug('Commercial Vehicles')
        ]);
        Category::updateOrCreate([
            'name' => 'Plant Machinery',
            'slug' => Str::slug('Plant Machinery')
        ]);

    }
}