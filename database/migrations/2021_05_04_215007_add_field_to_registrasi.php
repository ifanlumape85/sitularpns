<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToRegistrasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrasi', function (Blueprint $table) {
            $table->foreignId('id_detail_user')->after('id');
            $table->string('no_registrasi');
            if (Schema::hasColumn('registrasi', 'id_ujian')) {
                Schema::table('registrasi', function (Blueprint $table) {
                    $table->dropColumn('id_ujian');
                });
            }
            if (Schema::hasColumn('registrasi', 'id_user')) {
                Schema::table('registrasi', function (Blueprint $table) {
                    $table->dropColumn('id_user');
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrasi', function (Blueprint $table) {
            if (Schema::hasColumn('registrasi', 'id_detail_user')) {
                Schema::table('registrasi', function (Blueprint $table) {
                    $table->dropColumn('id_detail_user');
                });
            }
            if (Schema::hasColumn('registrasi', 'no_registrasi')) {
                Schema::table('registrasi', function (Blueprint $table) {
                    $table->dropColumn('no_registrasi');
                });
            }
        });
    }
}
