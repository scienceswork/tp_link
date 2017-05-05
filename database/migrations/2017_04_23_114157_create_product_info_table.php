<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_info', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('platform_id');
            $table->text('reseller')->comment('卖家');
            $table->decimal('price', 10, 2)->comment('价格');
            $table->integer('in_stock')->default(0);
            $table->string('fast_delivery')->comment('fast');
            $table->string('free_shipping')->comment('free');
            $table->integer('num')->default(1)->comment('采集次数');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_info');
    }
}
