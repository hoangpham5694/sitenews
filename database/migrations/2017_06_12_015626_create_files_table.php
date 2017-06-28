<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->text('content');
            $table->integer('system_id');
            $table->integer('cate_id');
            $table->integer('user_id');
            $table->string('size')->nullable();
            $table->string('version')->nullable();
            $table->string('system_require')->nullable();
            $table->string('direct_link')->nullable();
            $table->string('mirror_link1')->nullable();
            $table->string('mirror_link2')->nullable();
            $table->string('publisher_name')->nullable();
            $table->string('publisher_url')->nullable();
            $table->integer('downloaded')->nullable()->default(0);
            $table->integer('view')->nullable()->default(0);
            $table->integer('share')->nullable()->default(0);
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
        //
    }
}
