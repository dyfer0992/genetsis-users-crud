<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->smallInteger('preference_id');
            $table->string('preferencia');
        });

        \Illuminate\Support\Facades\DB::table('preferences')
            ->insert([
                ['preference_id' => 1, 'preferencia' => 'Deportes'],
                ['preference_id' => 2, 'preferencia' => 'Cine'],
                ['preference_id' => 3, 'preferencia' => 'Motor'],
                ['preference_id' => 4, 'preferencia' => 'Informática'],
                ['preference_id' => 5, 'preferencia' => 'Cocina'],
                ['preference_id' => 6, 'preferencia' => 'Viajes'],
            ]);

        Schema::create('users_preferences', function (Blueprint $table) {
            $table->unsignedSmallInteger('preference_id');
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
