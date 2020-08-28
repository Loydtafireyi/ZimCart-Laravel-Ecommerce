<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoToSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_settings', function (Blueprint $table) {
            $table->string('favicon')->nullable()->after('logo');
            $table->text('meta_keywords')->nullable()->after('favicon');
            $table->text('meta_description')->nullable()->after('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_settings', function (Blueprint $table) {
            $table->dropColumn('meta_keywords');
             $table->dropColumn('meta_description');
             $table->dropColumn('favicon');
        });
    }
}
