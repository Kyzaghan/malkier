<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('starter_user')->unsigned();
            $table->integer('assigned_user')->unsigned();
            $table->integer('assigner_user')->unsigned();
            $table->integer('finishes_user')->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('assigned_date');
            $table->dateTime('finish_date');
            $table->string('StartNote');
            $table->string('AssignNote');
            $table->string('FinishNote');
            $table->integer('worktype_id')->unsigned();
            $table->integer('supporttype_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->bigInteger('timespent');
            $table->integer('customer_id')->unsigned();
            $table->timestamps();

            //Set foreign keys
            $table->foreign('starter_user')->references('id')->on('users');
            $table->foreign('assigned_user')->references('id')->on('users');
            $table->foreign('finishes_user')->references('id')->on('users');
            $table->foreign('assigner_user')->references('id')->on('users');
            $table->foreign('worktype_id')->references('id')->on('work_types');
            $table->foreign('supporttype_id')->references('id')->on('support_types');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
