<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
         //  $table->unsignedBigInteger('category_id');

           //->references('id')->on('categories');
        //    $table->bigInteger('category_id')->index();
         //   $table->foreign('category_id')->references('id')->on('categories');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
//            $table->foreign('category_id')
//                ->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
