<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('email');
            $table->integer('age')->nullable()->after('gender'); 
            $table->string('date_of_birth')->nullable()->after('age');
            $table->string('picture')->nullable()->after('date_of_birth');
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
             $table->dropColumn('picture');
              $table->dropColumn('gender');
              $table->dropColumn('age'); 
              $table->dropColumn('date_of_birth');

        });
    }
};
