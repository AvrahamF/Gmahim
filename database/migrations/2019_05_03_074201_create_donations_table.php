<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id')                     ;
            $table->string    ('slug')         ->unique();
            $table->integer   ('donation_from_user')     ;
            $table->integer   ('donation_to_user')       ;
            $table->integer   ('donation_for_article')   ;
            $table->float     ('amount_donated')         ;
            $table->integer   ('created_by') ->nullable();
            $table->integer   ('modified_by')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
