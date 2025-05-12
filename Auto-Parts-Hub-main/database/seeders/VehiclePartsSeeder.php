<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class VehiclePartsSeeder extends Seeder
{
    public function run()
    {
        // Create the main Vehicle Parts category
        $vehicleParts = Category::create([
            'name' => 'Vehicle Parts',
            'slug' => 'vehicle-parts',
            'type' => 'vehicle',
            'description' => 'High-quality vehicle parts and components'
        ]);

        // Define subcategories and their products
        $categories = [
            'Engine Parts' => [
                'Pistons',
                'Crankshaft',
                'Cylinder Head'
            ],
            'Brake System' => [
                'Brake Pads',
                'Brake Rotors',
                'Brake Calipers'
            ],
            'Vehicle Transmission Components' => [
                'Gearbox',
                'Clutch',
                'Torque Converter'
            ],
            'Suspension System' => [
                'Shock Absorbers',
                'Struts',
                'Coil Springs'
            ],
            'Electrical System' => [
                'Alternator',
                'Starter Motor',
                'Battery'
            ],
            'Cooling System' => [
                'Radiator',
                'Water Pump',
                'Cooling Fan'
            ],
            'Fuel System' => [
                'Fuel Pump',
                'Fuel Injectors',
                'Fuel Filter'
            ],
            'Exhaust System' => [
                'Exhaust Manifold',
                'Catalytic Converter',
                'Exhaust Pipes'
            ],
            'Steering System' => [
                'Steering Wheel',
                'Steering Column',
                'Power Steering Pump'
            ],
            'Tire and Wheel Components' => [
                'Tires',
                'Rims',
                'Wheel Lug Nuts'
            ]
        ];

        // Create subcategories under Vehicle Parts
        foreach ($categories as $subcategoryName => $products) {
            $subcategory = Category::create([
                'name' => $subcategoryName,
                'slug' => Str::slug($subcategoryName),
                'type' => 'vehicle',
                'parent_id' => $vehicleParts->id,
                'description' => 'Collection of ' . strtolower($subcategoryName)
            ]);

            // Here we would create products, but that should be in a separate ProductSeeder
            // This is just creating the category structure
        }
    }
} 