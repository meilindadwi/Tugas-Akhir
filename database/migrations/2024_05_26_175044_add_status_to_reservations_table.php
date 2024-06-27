<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToReservationsTable extends Migration
{
    public function up()
{
    Schema::table('reservations', function (Blueprint $table) {
        if (!Schema::hasColumn('reservations', 'status')) {
            $table->string('status')->default('pending');
        }
    });
}

public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        if (Schema::hasColumn('reservations', 'status')) {
            $table->dropColumn('status');
        }
    });
}

}