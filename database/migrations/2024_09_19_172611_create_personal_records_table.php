<?php

use App\Models\Movement;
use App\Models\PersonalRecord;
use App\Models\User;
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
        Schema::create(PersonalRecord::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(PersonalRecord::USER_ID);
            $table->unsignedBigInteger(PersonalRecord::MOVEMENT_ID);
            $table->double(PersonalRecord::VALUE);
            $table->dateTime(PersonalRecord::DATE);
            $table->timestamps();

            $table->foreign(PersonalRecord::MOVEMENT_ID)->references(Movement::ID)->on(Movement::TABLE)->onDelete('cascade');
            $table->foreign(PersonalRecord::USER_ID)->references(User::ID)->on(User::TABLE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(PersonalRecord::TABLE);
    }
};
