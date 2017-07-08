<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_sanpham');
            $table->string('slug');
            $table->string('ma_sanpham');
            $table->string('cong_suat',50)->nullable();
            $table->string('kich_thuoc',50)->nullable();
            $table->string('quang_thong',50)->nullable();
            $table->string('gia',20);
            $table->string('giam_gia',20)->nullable();
            $table->string('img_path')->nullable();
            $table->text('thong_so');
            $table->string('so_luong',50)->default(0);
            $table->string('category_id',50);
            $table->boolean('delete')->default(0);
            $table->string('created_by',50);
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
        Schema::dropIfExists('product');
    }
}
