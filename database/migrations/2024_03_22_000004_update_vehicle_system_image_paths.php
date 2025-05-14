<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Category;

return new class extends Migration
{
    public function up(): void
    {
        $products = [
            // Engine Parts
            'Pistons' => 'Vehicle System/Engine Parts/Pistons.jpg',
            'Crankshaft' => 'Vehicle System/Engine Parts/Crankshaft.jpg',
            'Cylinder Head' => 'Vehicle System/Engine Parts/Cylinder_Head.jpg',
            
            // Brake System
            'Brake Pads' => 'Vehicle System/Brake System/Brake_Pads.jpg',
            'Brake Rotors' => 'Vehicle System/Brake System/Brake_Rotors.jpg',
            'Brake Calipers' => 'Vehicle System/Brake System/Brake_Calipers.jpg',
            
            // Transmission Components
            'Gearbox' => 'Vehicle System/Transmission Components/Gearbox.jpg',
            'Clutch' => 'Vehicle System/Transmission Components/Clutch.jpg',
            'Torque Converter' => 'Vehicle System/Transmission Components/Torque_Converter.jpg',
            
            // Suspension System
            'Shock Absorbers' => 'Vehicle System/Suspension System/Shock_Absorbers.jpg',
            'Struts' => 'Vehicle System/Suspension System/Struts.jpg',
            'Coil Springs' => 'Vehicle System/Suspension System/Coil_Springs.jpg',
            
            // Electrical System
            'Alternator' => 'Vehicle System/Electrical System/Alternator.jpg',
            'Starter Motor' => 'Vehicle System/Electrical System/Starter_Motor.jpg',
            'Battery' => 'Vehicle System/Electrical System/Battery.jpg',
            
            // Cooling System
            'Radiator' => 'Vehicle System/Cooling System/Radiator.jpg',
            'Water Pump' => 'Vehicle System/Cooling System/Water_Pump.jpg',
            'Cooling Fan' => 'Vehicle System/Cooling System/Cooling_Fan.jpg',
            
            // Fuel System
            'Fuel Pump' => 'Vehicle System/Fuel System/Fuel_Pump.jpg',
            'Fuel Injectors' => 'Vehicle System/Fuel System/Fuel_Injectors.jpg',
            'Fuel Filter' => 'Vehicle System/Fuel System/Fuel_Filter.jpg',
            
            // Exhaust System
            'Exhaust Manifold' => 'Vehicle System/Exhaust System/Exhaust_Manifold.jpg',
            'Catalytic Converter' => 'Vehicle System/Exhaust System/Catalytic_Converter.jpg',
            'Exhaust Pipes' => 'Vehicle System/Exhaust System/Exhaust_Pipes.jpg',
            
            // Steering System
            'Steering Wheel' => 'Vehicle System/Steering System/Steering_Wheel.jpg',
            'Steering Column' => 'Vehicle System/Steering System/Steering_Column.jpg',
            'Power Steering Pump' => 'Vehicle System/Steering System/Power_Steering_Pump.jpg',
            
            // Tire and Wheel Components
            'Tires' => 'Vehicle System/Tire and Wheel Components/Tires.jpg',
            'Rims' => 'Vehicle System/Tire and Wheel Components/Rims.jpg',
            'Wheel Lug Nuts' => 'Vehicle System/Tire and Wheel Components/Wheel_Lug_Nuts.jpg',
        ];

        foreach ($products as $name => $imagePath) {
            $product = Product::where('name', $name)->first();
            if ($product) {
                $product->image = $imagePath;
                $product->save();
            }
        }
    }

    public function down(): void
    {
        $products = Product::all();
        foreach ($products as $product) {
            if ($product->image && strpos($product->image, 'Vehicle System/') === 0) {
                $product->image = basename($product->image);
                $product->save();
            }
        }
    }
}; 