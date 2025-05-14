<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['user_id']);
            
            // Make user_id nullable and add back the foreign key
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('transactions', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['user_id']);
            
            // Make user_id nullable and add back the foreign key
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['user_id']);
            
            // Make user_id not nullable and add back the foreign key
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('transactions', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['user_id']);
            
            // Make user_id not nullable and add back the foreign key
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}; 