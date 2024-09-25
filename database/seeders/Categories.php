<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $main_cat_industrial_machines = Category::updateOrCreate(['name' => 'Industrial Machines', 'slug' => Str::slug('Industrial Machines')]);
        $main_cat_industrial_tooling = Category::updateOrCreate(['name' => 'Industrial Tooling', 'slug' => Str::slug('Industrial Tooling')]);
        $main_cat_manufacturing_woodworking = Category::updateOrCreate(['name' => 'Manufacturing & Woodworking', 'slug' => Str::slug('Manufacturing & Woodworking')]);
        $main_cat_vehicles = Category::updateOrCreate(['name' => 'Vehicles', 'slug' => Str::slug('Vehicles')]);

        $steel_metal_cat = Category::updateOrCreate([
            'name' => 'Sheet Metal Machinery',
            'slug' => Str::slug('Sheet Metal Machinery'),
        ])->parent()->associate($main_cat_industrial_machines)->save();

        Category::updateOrCreate(['name' => 'Decoiler', 'slug' => Str::slug('Decoiler')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Ductforming Machine', 'slug' => Str::slug('Ductforming Machine')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Folder - Box & Pan', 'slug' => Str::slug('Folder - Box & Pan')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Folder - Straight', 'slug' => Str::slug('Folder - Straight')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Folder - Universal', 'slug' => Str::slug('Folder - Universal')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rewinder', 'slug' => Str::slug('Rewinder')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rewinder - Duplex Slitter', 'slug' => Str::slug('Rewinder - Duplex Slitter')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rewinder - Logger', 'slug' => Str::slug('Rewinder - Logger')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Ring Former - Hydraulic', 'slug' => Str::slug('Ring Former - Hydraulic')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Ring Former - Electrical', 'slug' => Str::slug('Ring Former - Electrical')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Ring Former - Mechanical', 'slug' => Str::slug('Ring Former - Mechanical')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Ring Former - Hand', 'slug' => Str::slug('Ring Former - Hand')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rollformer', 'slug' => Str::slug('Rollformer')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Slitting Line', 'slug' => Str::slug('Slitting Line')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Seam Welder', 'slug' => Str::slug('Seam Welder')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Press - Trimming Press', 'slug' => Str::slug('Press - Trimming Press')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Turning Lathe CNC Horizontal', 'slug' => Str::slug('Turning Lathe CNC Horizontal')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Laser Cutter', 'slug' => Str::slug('Laser Cutter')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Purlin Line', 'slug' => Str::slug('Purlin Line')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rollformer Duplex', 'slug' => Str::slug('Rollformer Duplex')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rollforming Line', 'slug' => Str::slug('Rollforming Line')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rollformer Button Punch Snap Lock', 'slug' => Str::slug('Rollformer Button Punch Snap Lock')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Decoiling Line', 'slug' => Str::slug('Decoiling Line')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Recoiler', 'slug' => Str::slug('Recoiler')])->parent()->associate($steel_metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rollforming Line Stacker', 'slug' => Str::slug('Rollforming Line Stacker')])->parent()->associate($steel_metal_cat)->save();

        $woodworking_cat = Category::updateOrCreate([
            'name' => 'Woodworking Machinery',
            'slug' => Str::slug('Woodworking Machinery'),
        ])->parent()->associate($main_cat_industrial_machines)->save();

        Category::updateOrCreate(['name' => 'Mortiser - Chisel', 'slug' => Str::slug('Mortiser - Chisel')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Mortiser - Chain', 'slug' => Str::slug('Mortiser - Chain')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Saw - Rip Saw', 'slug' => Str::slug('Saw - Rip Saw')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Saw - Panel saw', 'slug' => Str::slug('Saw - Panel saw')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Planer - Planer Thicknesser', 'slug' => Str::slug('Planer - Planer Thicknesser')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Thicknesser', 'slug' => Str::slug('Thicknesser')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Tenoners', 'slug' => Str::slug('Tenoners')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Sanders', 'slug' => Str::slug('Sanders')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Saw - Vertical Panel saw', 'slug' => Str::slug('Saw - Vertical Panel saw')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Saw - Bench Saw', 'slug' => Str::slug('Saw - Bench Saw')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Planer - Surface Planer', 'slug' => Str::slug('Planer - Surface Planer')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Planer - Thicknesser', 'slug' => Str::slug('Planer - Thicknesser')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Sanders - Wide Belt Sander', 'slug' => Str::slug('Sanders - Wide Belt Sander')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Sanders - Oscillating Edge Sander', 'slug' => Str::slug('Sanders - Oscillating Edge Sander')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Sanders - Double End Sander', 'slug' => Str::slug('Sanders - Double End Sander')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Sanders - Combi Open End Sander', 'slug' => Str::slug('Sanders - Combi Open End Sander')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Sanders - Belt & Bobbin Sander', 'slug' => Str::slug('Sanders - Belt & Bobbin Sander')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Sanders - Through Feed Sander', 'slug' => Str::slug('Sanders - Through Feed Sander')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Spindle Moulders', 'slug' => Str::slug('Spindle Moulders')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Planer Moulders', 'slug' => Str::slug('Planer Moulders')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Tenoners - Single End', 'slug' => Str::slug('Tenoners - Single End')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Tenoners - Double End', 'slug' => Str::slug('Tenoners - Double End')])->parent()->associate($woodworking_cat)->save();
        Category::updateOrCreate(['name' => 'Band Resaws', 'slug' => Str::slug('Band Resaws')])->parent()->associate($woodworking_cat)->save();

        Category::updateOrCreate([
            'name' => 'Agricultural Machinery',
            'slug' => Str::slug('Agricultural Machinery'),
        ])->parent()->associate($main_cat_industrial_machines)->save();

        $welding_cat = Category::updateOrCreate([
            'name' => 'Welding Equipment',
            'slug' => Str::slug('Welding Equipment'),
        ])->parent()->associate($main_cat_industrial_tooling)->save();

        Category::updateOrCreate(['name' => 'Welding', 'slug' => Str::slug('Welding')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Tig Welder', 'slug' => Str::slug('Tig Welder')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Welder', 'slug' => Str::slug('Welder')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Arc Welder', 'slug' => Str::slug('Arc Welder')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Welding Turntable', 'slug' => Str::slug('Welding Turntable')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Positioner', 'slug' => Str::slug('Positioner')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Duct Seamer', 'slug' => Str::slug('Duct Seamer')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Orbital', 'slug' => Str::slug('Orbital')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Robots', 'slug' => Str::slug('Robots')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Welder - Arc', 'slug' => Str::slug('Welder - Arc')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Welder - Tig', 'slug' => Str::slug('Welder - Tig')])->parent()->associate($welding_cat)->save();
        Category::updateOrCreate(['name' => 'Welder - Mig', 'slug' => Str::slug('Welder - Mig')])->parent()->associate($welding_cat)->save();

        Category::updateOrCreate([
            'name' => 'Hand Tools',
            'slug' => Str::slug('Hand Tools'),
        ])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate([
            'name' => 'CNC Machinery',
            'slug' => Str::slug('CNC Machinery'),
        ])->parent()->associate($main_cat_industrial_machines)->save();
        Category::updateOrCreate([
            'name' => 'Construction',
            'slug' => Str::slug('Construction'),
        ])->parent()->associate($main_cat_industrial_tooling)->save();

        Category::updateOrCreate([
            'name' => 'Power Generation',
            'slug' => Str::slug('Power Generation'),
        ])->parent()->associate($main_cat_industrial_machines)->save();

        $metal_cat = Category::updateOrCreate([
            'name' => 'Metal Fabrication Machinery',
            'slug' => Str::slug('Metal Fabrication Machinery'),
        ])->parent()->associate($main_cat_industrial_machines)->save();

        Category::updateOrCreate(['name' => 'Bending Rolls - Plate', 'slug' => Str::slug('Bending Rolls - Plate')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Bending Rolls - Section', 'slug' => Str::slug('Bending Rolls - Section')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Beveller', 'slug' => Str::slug('Beveller')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Coil Handling', 'slug' => Str::slug('Coil Handling')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Compressor', 'slug' => Str::slug('Compressor')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Corner Notcher', 'slug' => Str::slug('Corner Notcher')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Cut To Length & Slitting Line', 'slug' => Str::slug('Cut To Length & Slitting Line')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Cut To Length Line', 'slug' => Str::slug('Cut To Length Line')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Dishing', 'slug' => Str::slug('Dishing')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Dust Extraction', 'slug' => Str::slug('Dust Extraction')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Finishing', 'slug' => Str::slug('Finishing')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Flanger', 'slug' => Str::slug('Flanger')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Fly Press', 'slug' => Str::slug('Fly Press')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Gas Cutter', 'slug' => Str::slug('Gas Cutter')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Gas Profile Cutter', 'slug' => Str::slug('Gas Profile Cutter')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Gasket Manufacturing', 'slug' => Str::slug('Gasket Manufacturing')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Guillotine - Hydraulic', 'slug' => Str::slug('Guillotine - Hydraulic')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Guillotine - Mechanical', 'slug' => Str::slug('Guillotine - Mechanical')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Guillotine - Treadle', 'slug' => Str::slug('Guillotine - Treadle')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Iron Worker - Hydraulic', 'slug' => Str::slug('Iron Worker - Hydraulic')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Iron worker - Mechanical', 'slug' => Str::slug('Iron worker - Mechanical')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Punch Press', 'slug' => Str::slug('Punch Press')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Punch &amp; Die Grinder', 'slug' => Str::slug('Punch &amp; Die Grinder')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Rolling Mill', 'slug' => Str::slug('Rolling Mill')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Saw - Bandsaw Horizontal', 'slug' => Str::slug('Saw - Bandsaw Horizontal')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Saw - Bandsaw Vertical', 'slug' => Str::slug('Saw - Bandsaw Vertical')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Saw - Coldsaw', 'slug' => Str::slug('Saw - Coldsaw')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Structural Steel Processing', 'slug' => Str::slug('Structural Steel Processing')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Testing Equipment', 'slug' => Str::slug('Testing Equipment')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Testing Hardness', 'slug' => Str::slug('Testing Hardness')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Tooling &amp; Miscellaneous', 'slug' => Str::slug('Tooling &amp; Miscellaneous')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Turning Lathe', 'slug' => Str::slug('Turning Lathe')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Tube - Bending', 'slug' => Str::slug('Tube - Bending')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Wire Processing', 'slug' => Str::slug('Wire Processing')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Gear Grinder', 'slug' => Str::slug('Gear Grinder')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Gear Shaper', 'slug' => Str::slug('Gear Shaper')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Gear Hobber', 'slug' => Str::slug('Gear Hobber')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Deep Hole Drilling Machine', 'slug' => Str::slug('Deep Hole Drilling Machine')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Bandsaw', 'slug' => Str::slug('Bandsaw')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Bandsaw Automatic', 'slug' => Str::slug('Bandsaw Automatic')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Drill Grinder', 'slug' => Str::slug('Drill Grinder')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Honing Stand', 'slug' => Str::slug('Honing Stand')])->parent()->associate($metal_cat)->save();
        Category::updateOrCreate(['name' => 'Drill - Radial Drill', 'slug' => Str::slug('Drill - Radial Drill')])->parent()->associate($metal_cat)->save();

        Category::updateOrCreate([
            'name' => 'Plastics Machinery',
            'slug' => Str::slug('Plastics Machinery'),
        ])->parent()->associate($main_cat_industrial_machines)->save();

        Category::updateOrCreate([
            'name' => 'Factory Equipment',
            'slug' => Str::slug('Factory Equipment'),
        ])->parent()->associate($main_cat_industrial_tooling)->save();

        $industrial_supply_cat = Category::updateOrCreate([
            'name' => 'Industrial Supply / MRO',
            'slug' => Str::slug('Industrial Supply / MRO'),
        ]);

        Category::updateOrCreate(['name' => 'Hydraulics & Pneumatics', 'slug' => Str::slug('Hydraulics & Pneumatics')])->parent()->associate($industrial_supply_cat)->save();
        Category::updateOrCreate(['name' => 'Pumps', 'slug' => Str::slug('Pumps')])->parent()->associate($industrial_supply_cat)->save();

        Category::updateOrCreate([
            'name' => 'Commercial Vehicles',
            'slug' => Str::slug('Commercial Vehicles'),
        ])->parent()->associate($main_cat_vehicles)->save();
        Category::updateOrCreate([
            'name' => 'Plant Machinery',
            'slug' => Str::slug('Plant Machinery'),
        ])->parent()->associate($main_cat_industrial_machines)->save();

        // Unknown - had parent_id = 0
        Category::updateOrCreate(['name' => 'Leveller', 'slug' => Str::slug('Leveller')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Lockformer', 'slug' => Str::slug('Lockformer')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Milling Machine', 'slug' => Str::slug('Milling Machine')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Nibbler', 'slug' => Str::slug('Nibbler')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Plasma Cutter', 'slug' => Str::slug('Plasma Cutter')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press Types', 'slug' => Str::slug('Press Types')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Power Press - Tran', 'slug' => Str::slug('Press - Power Press - Tran')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Forging', 'slug' => Str::slug('Press - Forging')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - High Speed Blankin', 'slug' => Str::slug('Press - High Speed Blankin')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Horizontal', 'slug' => Str::slug('Press - Horizontal')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Hydraulic', 'slug' => Str::slug('Press - Hydraulic')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Hydraulic 4 Column', 'slug' => Str::slug('Press - Hydraulic 4 Column')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Hydraulic Double Sided', 'slug' => Str::slug('Press - Hydraulic Double Sided')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Mechanical Double Side', 'slug' => Str::slug('Press - Mechanical Double Side')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Mechanical Eccentric', 'slug' => Str::slug('Press - Mechanical Eccentric')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Mechanical Open Fronted', 'slug' => Str::slug('Press - Mechanical Open Fronted')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Spotting', 'slug' => Str::slug('Press - Spotting')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press Brake', 'slug' => Str::slug('Press Brake')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press Brake - Upstroke', 'slug' => Str::slug('Press Brake - Upstroke')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press Brake - Downstroke', 'slug' => Str::slug('Press Brake - Downstroke')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Spinning - Flow Forming', 'slug' => Str::slug('Spinning - Flow Forming')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Straightener', 'slug' => Str::slug('Straightener')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Knuckle Joint', 'slug' => Str::slug('Press - Knuckle Joint')])->parent()->associate($main_cat_industrial_tooling)->save();
        Category::updateOrCreate(['name' => 'Press - Clicker Punch Press', 'slug' => Str::slug('Press - Clicker Punch Press')])->parent()->associate($main_cat_industrial_tooling)->save();


        Category::updateOrCreate(['name' => 'Other', 'slug' => Str::slug('Other')]);
    }
}
