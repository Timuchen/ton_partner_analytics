<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slag')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('proposal_category_id')->nullable();
            $table->foreign('proposal_category_id')->references('id')->on('proposal_categories');

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
        Schema::dropIfExists('proposal_categories');
    }
}
