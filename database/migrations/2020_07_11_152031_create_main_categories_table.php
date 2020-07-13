<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 150);
            $table->string('slug', 150)->nullable();
            $table->string('photo' , 150)->nullable();;
            $table->string('translation_lang' , 10);
            $table->integer('translation_of' )->unsigned();
            $table->tinyInteger('active' )->comment('0=>inactive 1=>active')->default('1');
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
        Schema::dropIfExists('main_categories');
    }
}
