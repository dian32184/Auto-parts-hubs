<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Get all subcategories
        $subcategories = Category::whereNotNull('parent_id')->get();

        foreach ($subcategories as $subcategory) {
            // Get the products array from the name
            $products = $this->getProductsForSubcategory($subcategory->name);

            // Create products for each subcategory
            foreach ($products as $productName) {
                Product::create([
                    'name' => $productName,
                    'slug' => Str::slug($productName),
                    'short_description' => 'High-quality ' . strtolower($productName),
                    'description' => 'Detailed description for ' . $productName,
                    'regular_price' => rand(50, 500), // Random price between 50 and 500
                    'SKU' => strtoupper(Str::random(8)),
                    'stock_status' => 'instock',
                    'quantity' => rand(10, 100),
                    'category_id' => $subcategory->id,
                    'status' => 'active'
                ]);
            }
        }
    }

    private function getProductsForSubcategory($subcategoryName)
    {
        // Define specific products for each subcategory
        $productsBySubcategory = [
            // Motor Parts Products
            'Transmission Components' => [
                'Standard Transmission Gearbox',
                'Heavy-Duty Transmission Gearbox',
                'Timing Belt',
                'Drive Belt',
                'Drive Pulley',
                'Timing Pulley'
            ],
            'Safety Components' => [
                'Thermal Circuit Breaker',
                'Magnetic Circuit Breaker',
                'High-Speed Fuse',
                'Slow-Blow Fuse',
                'Thermal Overload Protector',
                'Temperature Switch'
            ],
            // Vehicle Parts Products
            'Engine Parts' => [
                'High Performance Piston Set',
                'Forged Steel Crankshaft',
                'Aluminum Cylinder Head',
                'Engine Block Assembly',
                'Valve Cover Set',
                'Timing Chain Kit'
            ],
            'Brake System' => [
                'Ceramic Brake Pads',
                'Slotted Brake Rotors',
                'Performance Brake Calipers',
                'Brake Line Kit',
                'Master Cylinder',
                'Brake Fluid DOT 4'
            ],
            'Vehicle Transmission Components' => [
                'Automatic Transmission Gearbox',
                'Heavy-Duty Clutch Kit',
                'Performance Torque Converter',
                'Transmission Filter Kit',
                'Shift Cable Set',
                'Transmission Mount'
            ],
            'Suspension System' => [
                'Performance Shock Absorbers',
                'Lowering Springs',
                'MacPherson Struts',
                'Control Arms Kit',
                'Sway Bar Links',
                'Ball Joint Set'
            ],
            'Electrical System' => [
                'High Output Alternator',
                'High Torque Starter Motor',
                'AGM Battery',
                'Ignition Coil Set',
                'Spark Plug Wires',
                'ECU Module'
            ],
            'Cooling System' => [
                'Aluminum Racing Radiator',
                'Electric Water Pump',
                'Performance Cooling Fan',
                'Thermostat Housing',
                'Coolant Reservoir',
                'Radiator Hose Kit'
            ],
            'Fuel System' => [
                'High Flow Fuel Pump',
                'Performance Fuel Injectors',
                'Premium Fuel Filter',
                'Fuel Pressure Regulator',
                'Fuel Rail Kit',
                'Fuel Tank'
            ],
            'Exhaust System' => [
                'Performance Exhaust Manifold',
                'High Flow Catalytic Converter',
                'Stainless Steel Exhaust Pipes',
                'Muffler Kit',
                'Exhaust Tips',
                'Exhaust Gasket Set'
            ],
            'Steering System' => [
                'Sport Steering Wheel',
                'Power Steering Column',
                'High Flow Power Steering Pump',
                'Steering Rack',
                'Tie Rod Ends',
                'Steering Knuckle'
            ],
            'Tire and Wheel Components' => [
                'Performance Tires',
                'Alloy Wheel Rims',
                'Chrome Wheel Lug Nuts',
                'TPMS Sensors',
                'Wheel Spacers',
                'Wheel Bearings'
            ]
        ];

        return $productsBySubcategory[$subcategoryName] ?? [
            $subcategoryName . ' - Product 1',
            $subcategoryName . ' - Product 2',
            $subcategoryName . ' - Product 3'
        ];
    }
} 