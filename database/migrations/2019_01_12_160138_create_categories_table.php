<?php
//231 - 1. ten plik stworzyl sie po dodaniu php artisan make:model Category -m
//2. stworzyl sie drugi plik Category.php w katalogu /app/http/Category.php i w nim dodajemy fillable
//
//potem w tym pliku dodajemy /table->string('name') ....
//i na koncu pph arisan migrate - stowrzy sie na bazie danych tabela
//potem mozemy sie odwolac np. $post->category->name

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //231
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
        Schema::drop('categories');
    }
}
