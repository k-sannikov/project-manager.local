<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('task_id');
            $table->string('task_name', 100)->comment('Наименование задачи');
            $table->text('description')->comment('Описание задачи');
            $table->integer('priority')->unsigned()->comment('Приоритет');
            $table->bigInteger('user_id')->unsigned()->comment('Исполнитель');
            $table->boolean('status')->nullable()->comment('Статус задачи');
            $table->timestamps();
            // //создание внешнего ключа
            // $table->foreign('user_id')
            //     ->references('user_id')->on('users')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
