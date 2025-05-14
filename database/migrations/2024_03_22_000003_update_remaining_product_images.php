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
            // Cooling Components
            'Cooling Fins' => 'Motor Parts/Cooling Components/cooling_fins.jpg',
            'Heat Sinks' => 'Motor Parts/Cooling Components/heat_sinks.jpg',
            'Fans' => 'Motor Parts/Cooling Components/fans.jpg',
            
            // Power Supply
            'Capacitors' => 'Motor Parts/Power Supply/capacitors.jpg',
            'Rectifiers' => 'Motor Parts/Power Supply/rectifiers.jpg',
            'Transformers' => 'Motor Parts/Power Supply/transformers.jpg',
            
            // Communication Components
            'Communication Protocol Adapters' => 'Motor Parts/Communication Components/communication_protocol_adapters.jpg',
            'Wiring Harnesses' => 'Motor Parts/Communication Components/wiring_harnesses.jpg',
            'Connectors' => 'Motor Parts/Communication Components/connectors.jpg'
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
            if ($product->image) {
                $product->image = basename($product->image);
                $product->save();
            }
        }
    }
}; 