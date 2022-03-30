<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function ($table) {
            $table->string('jenis_kelamin', 10)->nullable()->after('nama');
            $table->string('email', 25)->nullable()->after('jurusan');
            $table->string('alamat', 50)->nullable()->after('jurusan');
            $table->date('tanggal_lahir')->nullable()->after('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function ($table) {
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('email');
            $table->dropColumn('alamat');
            $table->dropColumn('tanggal_lahir');
        });
    }
}
