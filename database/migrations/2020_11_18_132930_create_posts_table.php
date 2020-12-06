<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->text('title');
            $table->text('text');
            $table->text('summary');
            $table->string('url_image', 255);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->ondelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropForeign('posts_category_id_foreign');
        });
        Schema::dropIfExists('posts');
    }
}
