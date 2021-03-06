<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('studentID')->unique();
            $table->string('password');
            $table->boolean('isAdmin')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(

            array(
                'name' => 'admin',
                'surname' => 'admin',
                'studentID' => 'NULL',
                'password' => bcrypt("admin123"),
                'isAdmin' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            )

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');

    }
}
