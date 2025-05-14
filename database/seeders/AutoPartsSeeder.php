<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;

class AutoPartsSeeder extends Seeder
{
    public function run()
    {
        // Create default brand
        $defaultBrand = Brand::firstOrCreate(
            ['slug' => 'auto-parts-hub'],
            [
                'name' => 'Auto Parts Hub',
                'slug' => 'auto-parts-hub'
            ]
        );

        // Create main categories
        $motorParts = Category::firstOrCreate(
            ['slug' => 'motor-parts'],
            [
                'name' => 'Motor Parts',
                'slug' => 'motor-parts'
            ]
        );

        $vehicleSystem = Category::firstOrCreate(
            ['slug' => 'vehicle-system'],
            [
                'name' => 'Vehicle System',
                'slug' => 'vehicle-system'
            ]
        );

        // Motor Parts Categories and Products
        $motorPartsCategories = [
            'electrical-components' => [
                'name' => 'Electrical Components',
                'products' => [
                    ['name' => 'Stator', 'price' => 299.99],
                    ['name' => 'Rotor', 'price' => 249.99],
                    ['name' => 'Windings', 'price' => 179.99],
                ]
            ],
            'mechanical-components' => [
                'name' => 'Mechanical Components',
                'products' => [
                    ['name' => 'Shaft', 'price' => 199.99],
                    ['name' => 'Bearings', 'price' => 89.99],
                    ['name' => 'Casing/Housing', 'price' => 299.99],
                ]
            ],
            'cooling-components' => [
                'name' => 'Cooling Components',
                'products' => [
                    ['name' => 'Fans', 'price' => 79.99],
                    ['name' => 'Heat Sinks', 'price' => 59.99],
                    ['name' => 'Cooling Fins', 'price' => 39.99],
                ]
            ],
            'control-components' => [
                'name' => 'Control Components',
                'products' => [
                    ['name' => 'Motor Controllers', 'price' => 399.99],
                    ['name' => 'Variable Frequency Drives', 'price' => 599.99],
                    ['name' => 'Contactor', 'price' => 149.99],
                ]
            ],
            'power-supply' => [
                'name' => 'Power Supply',
                'products' => [
                    ['name' => 'Transformers', 'price' => 299.99],
                    ['name' => 'Rectifiers', 'price' => 199.99],
                    ['name' => 'Capacitors', 'price' => 89.99],
                ]
            ],
            'mounting-components' => [
                'name' => 'Mounting Components',
                'products' => [
                    ['name' => 'Motor Brackets', 'price' => 129.99],
                    ['name' => 'Brake/Clutch Reservoir Base', 'price' => 159.99],
                    ['name' => 'Mounting Plates', 'price' => 99.99],
                ]
            ],
            'transmission-components' => [
                'name' => 'Transmission Components',
                'products' => [
                    ['name' => 'Transmission Gearbox', 'price' => 799.99],
                    ['name' => 'Belts', 'price' => 49.99],
                    ['name' => 'Pulleys', 'price' => 79.99],
                ]
            ],
            'safety-components' => [
                'name' => 'Safety Components',
                'products' => [
                    ['name' => 'Circuit Breakers', 'price' => 129.99],
                    ['name' => 'Fuses', 'price' => 19.99],
                    ['name' => 'Thermal Protection Devices', 'price' => 89.99],
                ]
            ],
            'communication-components' => [
                'name' => 'Communication Components',
                'products' => [
                    ['name' => 'Communication Protocol Adapters', 'price' => 199.99],
                    ['name' => 'Wiring Harnesses', 'price' => 149.99],
                    ['name' => 'Connectors', 'price' => 29.99],
                ]
            ],
            'miscellaneous-components' => [
                'name' => 'Miscellaneous Components',
                'products' => [
                    ['name' => 'Gaskets', 'price' => 19.99],
                    ['name' => 'Seals', 'price' => 24.99],
                    ['name' => 'Vibration Dampeners', 'price' => 39.99],
                ]
            ],
        ];

        // Vehicle System Categories and Products
        $vehicleSystemCategories = [
            'engine-parts' => [
                'name' => 'Engine Parts',
                'products' => [
                    ['name' => 'Pistons', 'price' => 199.99],
                    ['name' => 'Crankshaft', 'price' => 599.99],
                    ['name' => 'Cylinder Head', 'price' => 799.99],
                ]
            ],
            'brake-system' => [
                'name' => 'Brake System',
                'products' => [
                    ['name' => 'Brake Pads', 'price' => 79.99],
                    ['name' => 'Brake Rotors', 'price' => 129.99],
                    ['name' => 'Brake Calipers', 'price' => 199.99],
                ]
            ],
            'transmission-system' => [
                'name' => 'Transmission Components',
                'products' => [
                    ['name' => 'Gearbox', 'price' => 999.99],
                    ['name' => 'Clutch', 'price' => 399.99],
                    ['name' => 'Torque Converter', 'price' => 599.99],
                ]
            ],
            'suspension-system' => [
                'name' => 'Suspension System',
                'products' => [
                    ['name' => 'Shock Absorbers', 'price' => 199.99],
                    ['name' => 'Struts', 'price' => 249.99],
                    ['name' => 'Coil Springs', 'price' => 149.99],
                ]
            ],
            'electrical-system' => [
                'name' => 'Electrical System',
                'products' => [
                    ['name' => 'Alternator', 'price' => 299.99],
                    ['name' => 'Starter Motor', 'price' => 249.99],
                    ['name' => 'Battery', 'price' => 199.99],
                ]
            ],
            'cooling-system' => [
                'name' => 'Cooling System',
                'products' => [
                    ['name' => 'Radiator', 'price' => 299.99],
                    ['name' => 'Water Pump', 'price' => 149.99],
                    ['name' => 'Cooling Fan', 'price' => 99.99],
                ]
            ],
            'fuel-system' => [
                'name' => 'Fuel System',
                'products' => [
                    ['name' => 'Fuel Pump', 'price' => 199.99],
                    ['name' => 'Fuel Injectors', 'price' => 299.99],
                    ['name' => 'Fuel Filter', 'price' => 49.99],
                ]
            ],
            'exhaust-system' => [
                'name' => 'Exhaust System',
                'products' => [
                    ['name' => 'Exhaust Manifold', 'price' => 399.99],
                    ['name' => 'Catalytic Converter', 'price' => 599.99],
                    ['name' => 'Exhaust Pipes', 'price' => 199.99],
                ]
            ],
            'steering-system' => [
                'name' => 'Steering System',
                'products' => [
                    ['name' => 'Steering Wheel', 'price' => 199.99],
                    ['name' => 'Steering Column', 'price' => 299.99],
                    ['name' => 'Power Steering Pump', 'price' => 249.99],
                ]
            ],
            'tire-and-wheel' => [
                'name' => 'Tire and Wheel Components',
                'products' => [
                    ['name' => 'Tires', 'price' => 199.99],
                    ['name' => 'Rims', 'price' => 299.99],
                    ['name' => 'Wheel Lug Nuts', 'price' => 29.99],
                ]
            ],
        ];

        // Create Motor Parts categories and products
        foreach ($motorPartsCategories as $slug => $categoryData) {
            $category = Category::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $categoryData['name'],
                    'slug' => $slug,
                    'parent_id' => $motorParts->id
                ]
            );

            foreach ($categoryData['products'] as $productData) {
                Product::firstOrCreate(
                    ['slug' => Str::slug($productData['name'])],
                    [
                        'name' => $productData['name'],
                        'slug' => Str::slug($productData['name']),
                        'short_description' => 'Quality ' . $productData['name'],
                        'description' => 'High-quality ' . $productData['name'] . ' for optimal performance',
                        'regular_price' => $productData['price'],
                        'sale_price' => $productData['price'] * 0.9,
                        'SKU' => strtoupper(substr(str_replace([' ', '-'], '', $productData['name']), 0, 3)) . '-' . rand(100, 999),
                        'stock_status' => 'instock',
                        'quantity' => rand(10, 50),
                        'category_id' => $category->id,
                        'brand_id' => $defaultBrand->id,
                        'featured' => 0,
                        'status' => 1
                    ]
                );
            }
        }

        // Create Vehicle System categories and products
        foreach ($vehicleSystemCategories as $slug => $categoryData) {
            $category = Category::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $categoryData['name'],
                    'slug' => $slug,
                    'parent_id' => $vehicleSystem->id
                ]
            );

            foreach ($categoryData['products'] as $productData) {
                Product::firstOrCreate(
                    ['slug' => Str::slug($productData['name'])],
                    [
                        'name' => $productData['name'],
                        'slug' => Str::slug($productData['name']),
                        'short_description' => 'Quality ' . $productData['name'],
                        'description' => 'High-quality ' . $productData['name'] . ' for optimal performance',
                        'regular_price' => $productData['price'],
                        'sale_price' => $productData['price'] * 0.9,
                        'SKU' => strtoupper(substr(str_replace([' ', '-'], '', $productData['name']), 0, 3)) . '-' . rand(100, 999),
                        'stock_status' => 'instock',
                        'quantity' => rand(10, 50),
                        'category_id' => $category->id,
                        'brand_id' => $defaultBrand->id,
                        'featured' => 0,
                        'status' => 1
                    ]
                );
            }
        }
    }
} 