<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{
    public function up(): void
    {
        $galleryImages = [
            'Windings' => [
                'Motor Parts/Electrical Components/Windings_1.jpg',
                'Motor Parts/Electrical Components/Windings_2.jpg',
                'Motor Parts/Electrical Components/Windings_3.jpg'
            ],
            'Stator' => [
                'Motor Parts/Electrical Components/Stator_1.jpg',
                'Motor Parts/Electrical Components/Stator_2.jpg',
                'Motor Parts/Electrical Components/Stator_3.jpg'
            ],
            'Rotor' => [
                'Motor Parts/Electrical Components/Rotor_1.jpg',
                'Motor Parts/Electrical Components/Rotor_2.jpg',
                'Motor Parts/Electrical Components/Rotor_3.jpg'
            ]
        ];

        foreach ($galleryImages as $productName => $images) {
            $product = Product::where('name', $productName)->first();
            if ($product) {
                $product->images = implode(',', $images);
                $product->save();
            }
        }
    }

    public function down(): void
    {
        $products = Product::whereNotNull('images')->get();
        foreach ($products as $product) {
            $product->images = null;
            $product->save();
        }
    }
}; 