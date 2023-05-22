<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('author')->nullable();
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->text('url')->nullable();
            $table->text('source');
            $table->text('country')->nullable();
            $table->text('lang')->nullable();
            $table->text('category')->nullable();
            $table->text('urlToImage')->nullable();
            $table->text('publishedAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
