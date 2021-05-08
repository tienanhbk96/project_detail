<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_item', function (Blueprint $table) {
            $table->string('item_cd', 6)->required()->primary();
            $table->string('item_nm_j', 120)->required();
            $table->string('item_nm_e', 120)->required();
            $table->string('specification', 120)->nullable();
            $table->string('unit_qty_div', 3)->nullable();
            $table->string('stock_management_div', 1)->required();
            
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
        Schema::dropIfExists('m_item');
    }
}
