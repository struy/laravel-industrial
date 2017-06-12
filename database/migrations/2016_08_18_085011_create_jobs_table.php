<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title_de')->nullable();
            $table->text('title_en')->nullable();
            $table->text('person')->nullable();
            $table->text('email')->nullable();
            $table->text('street')->nullable();
            $table->text('street_num')->nullable();
            $table->integer('post_code')->unsigned()->nullable();
            $table->text('country')->nullable();
            $table->text('city')->nullable();

            $table->text('loc_country_de')->nullable();
            $table->text('loc_city_de')->nullable();
            $table->text('loc_country_en')->nullable();
            $table->text('loc_city_en')->nullable();

            $table->date('start_date');
            $table->integer('salary')->unsigned();
            $table->text('desc_company_de')->nullable();
            $table->text('desc_company_en')->nullable();
            $table->text('desc_job_de')->nullable();
            $table->text('desc_job_en')->nullable();
            $table->text('requirements_de')->nullable();
            $table->text('requirements_en')->nullable();
            //$table->text('attachment')->nullable();
            $table->timestamps();

       /* title, start date, job location. + кнопки learn more */


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobs');
    }
}
