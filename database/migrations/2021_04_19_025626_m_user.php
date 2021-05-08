<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->string('user_cd', 20)->required()->primary();
            $table->string('user_nm_j', 50)->required();
            $table->string('user_ab_j', 20)->required();
            $table->string('user_nm_e', 50)->required();
            $table->string('user_ab_e', 20)->required();
            $table->string('pwd', 20)->required();
            $table->string('belong_div', 3)->required();
            $table->string('position_div', 2)->required();
            $table->string('auth_role_div', 3)->required();
            $table->string('incumbent_div', 1)->required();
            $table->dateTime('pwd_upd_datetime')->nullable();
            $table->dateTime('login_datetime')->nullable();

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
        Schema::dropIfExists('m_user');
    }
}
