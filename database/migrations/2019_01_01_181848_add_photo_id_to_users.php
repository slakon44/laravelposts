<?php
//203 php artisan make:migration add_photo_id_to_users --table=users
//203 a po zmianach php artisan migrate i idziemy do http/request/userrequest
//

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('photo_id'); //203
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('photo_id');
        });
    }
}
