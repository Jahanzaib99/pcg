<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->string('grade')->nullable();
            $table->string('auction_id')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('psa')->nullable();
            $table->string('psa_cert_number')->nullable();
            $table->string('sale_type')->nullable();
            $table->string('image_url')->nullable();
            $table->string('price')->nullable();
            $table->timestamp('sale_date')->nullable();
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
        Schema::dropIfExists('card_details');
    }
}
