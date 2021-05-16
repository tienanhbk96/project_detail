<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TWorkReportD extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_work_report_d', function (Blueprint $table) {
            $table->string('work_report_no', 12)->required();
            $table->integer('work_report_detail_no')->required();
            $table->string('manufacture_no', 8)->required();
            $table->string('work_hour_div', 2)->required();
            $table->string('work_time_div', 2)->required();

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
            $table->primary(['work_report_no', 'work_report_detail_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_work_report_d');
    }
};