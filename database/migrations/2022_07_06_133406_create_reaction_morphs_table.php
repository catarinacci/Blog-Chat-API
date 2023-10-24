<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionMorphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reaction_morphs', function (Blueprint $table) {
                $table->id();
                $table->string('mensaje');
                $table->unsignedBigInteger('reactionmorphable_id');
                $table->string('reactionmorphable_type');

                // $table->unsignedBigInteger('user_id')->unsigned();
                // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                // $table->unsignedBigInteger('note_id')->unsigned();
                // $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');

                // $table->unsignedBigInteger('typereaction_id')->unsigned();
                // $table->foreign('typereaction_id')->references('id')->on('typereactions')->onDelete('cascade');

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
        Schema::dropIfExists('reaction_morphs');
    }
}
