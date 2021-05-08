<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SLibVal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_lib_val', function (Blueprint $table) {
            $table->string('lib_cd', 30)->required();
            $table->string('lib_val_cd', 10)->required();
            $table->string('lib_val_nm_j', 100)->required();
            $table->string('lib_val_ab_j', 50)->required();
            $table->string('lib_val_nm_e', 100)->required();
            $table->string('lib_val_ab_e', 50)->required();
            $table->string('lib_val_ctl1', 50)->nullable();
            $table->string('lib_val_ctl2', 50)->nullable();
            $table->string('lib_val_ctl3', 50)->nullable();
            $table->string('lib_val_ctl4', 50)->nullable();
            $table->string('lib_val_ctl5', 50)->nullable();
            $table->string('lib_val_ctl6', 50)->nullable();
            $table->string('lib_val_ctl7', 50)->nullable();
            $table->string('lib_val_ctl8', 50)->nullable();
            $table->string('lib_val_ctl9', 50)->nullable();
            $table->string('lib_val_ctl10', 50)->nullable();
            $table->string('ini_target_div', 1)->nullable();
            $table->integer('disp_order')->nullable()->default(0);

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
            $table->primary(['lib_cd', 'lib_val_cd']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_lib_val');
    }
}


