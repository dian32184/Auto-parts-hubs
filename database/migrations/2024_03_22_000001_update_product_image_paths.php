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
        $statorProduct = Product::where('name', 'Stator')->first();
        if ($statorProduct) {
            $statorProduct->image = 'Motor Parts/Electrical Components/Stator.jpg';
            $statorProduct->save();
        }
    }

    public function down(): void
    {
        $statorProduct = Product::where('name', 'Stator')->first();
        if ($statorProduct) {
            // Revert to original path
            $statorProduct->image = 'stator.jpg';
            $statorProduct->save();
        }
    }
}; 