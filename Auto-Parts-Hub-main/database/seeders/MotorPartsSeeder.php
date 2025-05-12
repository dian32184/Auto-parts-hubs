<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class MotorPartsSeeder extends Seeder
{
    public function run()
    {
        // Create the main Motor Parts category
        $motorParts = Category::create([
            'name' => 'Motor Parts',
            'slug' => 'motor-parts',
            'type' => 'motor',
            'description' => 'High-quality motor parts and components'
        ]);

        // Define subcategories and their products
        $categories = [
            'Transmission Components' => [
                'Transmission Gearbox',
                'Belts',
                'Pulleys'
            ],
            'Safety Components' => [
                'Circuit Breakers',
                'Fuses',
                'Thermal Protection Devices'
            ],
            'Electrical Components' => [
                'Stator',
                'Rotor',
                'Windings'
            ],
            'Mechanical Components' => [
                'Shaft',
                'Bearings',
                'Casing/Housing'
            ],
            'Cooling Components' => [
                'Fans',
                'Heat Sinks',
                'Cooling Fins'
            ],
            'Control Components' => [
                'Motor Controllers',
                'Variable Frequency Drives',
                'Contactor'
            ],
            'Power Supply' => [
                'Transformers',
                'Rectifiers',
                'Capacitors'
            ],
            'Mounting Components' => [
                'Motor Brackets',
                'Brake/Clutch Reservoir Base',
                'Mounting Plates'
            ],
            'Communication Components' => [
                'Communication Protocol Adapters',
                'Wiring Harnesses',
                'Connectors'
            ],
            'Miscellaneous Components' => [
                'Gaskets',
                'Seals',
                'Vibration Dampeners'
            ]
        ];

        // Create subcategories under Motor Parts
        foreach ($categories as $subcategoryName => $products) {
            $subcategory = Category::create([
                'name' => $subcategoryName,
                'slug' => Str::slug($subcategoryName),
                'type' => 'motor',
                'parent_id' => $motorParts->id,
                'description' => 'Collection of ' . strtolower($subcategoryName)
            ]);

            // Here we would create products, but that should be in a separate ProductSeeder
            // This is just creating the category structure
        }
    }
} 