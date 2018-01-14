<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('desc');
            $table->integer('price');
            $table->timestamps();
        });
        $data = array(
            array('name'=>'Minta Pizza', 'desc'=>'Ez az első minta pizza', 'price'=>'500'),
            array('name'=>'Ananász Pizza', 'desc'=>'Ez a második minta pizza', 'price'=>'700'),
        );

        DB::table('pizzas')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}
