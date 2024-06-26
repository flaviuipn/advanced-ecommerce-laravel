<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->id();
            
            $table->integer('category_id');  //cheie straina
            $table->integer('subcategory_id'); //cheie straina
            $table->string('subsubcategory_name_eng');
            $table->string('subsubcategory_name_ro');
            $table->string('subsubcategory_slung_eng');
            $table->string('subsubcategory_slung_ro');
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
        Schema::dropIfExists('sub_sub_categories');
    }
}
