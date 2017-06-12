<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectServices extends Migration
{
    /**
     * Run the migrations.   $table->softDeletes();
     *
     * @return void
     */
    public function up()
    {

        Schema::create('project_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name_de')->nullable();
            $table->text('name_en')->nullable();

        });


        Schema::create('project_knowledges', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name_de')->nullable();
            $table->text('name_en')->nullable();
        });





        Schema::create('project_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_de', 45)->nullable();
            $table->string('name_en', 45)->nullable();
            $table->integer('duration')->unsigned();
            $table->text('duration_desc_de')->nullable();
            $table->text('duration_desc_en')->nullable();
            $table->text('result_de')->nullable();
            $table->text('result_en')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_en')->nullable();
            $table->text('background_de')->nullable();
            $table->text('background_en')->nullable();
            $table->integer('cost')->unsigned();

            $table->integer('project_categories_id')->unsigned();
            $table->foreign('project_categories_id')->references('id')->on('project_categories');

        });





        Schema::create('services_has_knowledges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_services_id')->unsigned();
            $table->foreign('project_services_id')->references('id')->on('project_services');
            $table->integer('project_knowledges_id')->unsigned();
            $table->foreign('project_knowledges_id')->references('id')->on('project_knowledges');


        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->boolean('confirmed')->default(0);
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('project_services_id')->unsigned();
            $table->foreign('project_services_id')->references('id')->on('project_services')->onDelete('cascade');
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

        Schema::drop('bookings');
        Schema::drop('services_has_knowledges');
        Schema::drop('project_services');
        Schema::drop('project_knowledges');
        Schema::drop('project_categories');




    }
}
