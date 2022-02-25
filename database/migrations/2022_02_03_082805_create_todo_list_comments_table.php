<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoListCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_list_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('todoListCommentsParentTodoIdentifier');
            $table->string('todoListCommentsText')->nullable();
            $table->integer('todoListCommentsEmployeeIdentifier');
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
        Schema::dropIfExists('todo_list_comments');
    }
}
