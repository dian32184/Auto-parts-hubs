<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type',['fixed','percent']);
            $table->decimal('value');
            $table->decimal('cart_value');
            $table->date('expiry_date')->default(DB::raw("(DATE(CURRENT_TIMESTAMP))"));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
       Schema::dropIfExists('coupons');
    }
}