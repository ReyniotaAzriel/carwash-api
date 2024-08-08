<?php
// database/migrations/xxxx_xx_xx_create_bookings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_type');
            $table->unsignedBigInteger('vehicle_id');
            $table->enum('status', ['pending', 'confirm', 'completed']);
            $table->timestamp('scheduled_time');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('service_type')->references('id')->on('services');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
