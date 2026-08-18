<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->text('isi')->nullable()->after('perihal');
            $table->string('penandatangan')->nullable()->after('isi');
            $table->string('jabatan')->nullable()->after('penandatangan');
        });
    }

    public function down()
    {
        Schema::table('surats', function (Blueprint $table) {
            $table->dropColumn(['isi', 'penandatangan', 'jabatan']);
        });
    }
};