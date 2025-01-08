<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBabColumnsToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('bab2')->nullable()->after('cover'); // Kolom bab2
            $table->string('bab3')->nullable()->after('bab2'); // Kolom bab3
            $table->string('bab4')->nullable()->after('bab3'); // Kolom bab4
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn(['bab2', 'bab3', 'bab4']);
        });
    }
}
