<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_customers', function (Blueprint $table) {
            $table->integer('department_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->timestamps();

            //Set indexes
            $table->primary(['customer_id', 'department_id']);

            //Set foreign keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_customers');
    }
}
