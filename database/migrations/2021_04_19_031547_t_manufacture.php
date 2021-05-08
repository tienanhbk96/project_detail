<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TManufacture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_manufacture', function (Blueprint $table) {
            $table->string('manufacture_no', 8)->required()->primary();
            $table->string('item_cd', 6)->required();
            $table->integer('manufacture_qty')->required();
            $table->string('serial_no_from', 7)->nullable();
            $table->string('serial_no_to', 7)->nullable();
            $table->string('production_status_div', 1)->nullable();
            $table->dateTime('required_calc_datetime')->nullable();
            $table->string('complete_date', 8)->nullable();
            $table->string('remarks', 200)->nullable();

            $table->string('memo', 200)->nullable();
            $table->string('cre_user_cd', 20)->nullable();
            $table->string('cre_prg_cd', 50)->nullable();
            $table->string('cre_ip', 20)->nullable();
            $table->dateTime('cre_datetime')->nullable();
            $table->string('upd_user_cd', 20)->nullable();
            $table->string('upd_prg_cd', 50)->nullable();
            $table->string('upd_ip', 20)->nullable();
            $table->dateTime('upd_datetime')->nullable();
            $table->string('del_user_cd', 20)->nullable();
            $table->string('del_prg_cd', 50)->nullable();
            $table->string('del_ip', 20)->nullable();
            $table->dateTime('del_datetime')->nullable();
            $table->integer('del_flg')->require()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_manufacture');
    }
}
