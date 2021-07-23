<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('open_statistics')->nullable();
            $table->string('url_forum')->nullable();

            $table->string('image')->nullable();

            $table->float('amount_requested')->nullable(); 
            $table->float('paid_amount')->nullable();
            $table->dateTime('date_time')->nullable();

            $table->unsignedBigInteger('proposal_category_id');
            $table->foreign('proposal_category_id')
            ->references('id')->on('proposal_categories')
            ->onDelete('cascade');

            $table->unsignedBigInteger('proposal_status_id')->nullable();
            $table->foreign('proposal_status_id')->references('id')->on('proposal_statuses');
            

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
        Schema::dropIfExists('proposals');
    }
}
