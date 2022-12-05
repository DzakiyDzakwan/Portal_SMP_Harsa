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
        /* log_insert_profile */
        DB::unprepared('
        CREATE TRIGGER log_insert_profile
        AFTER INSERT ON user_profiles
        FOR EACH ROW
        BEGIN
        INSERT INTO log_profiles(user, email, nama, alamat_tinggal, alamat_domisili, tempat_lahir, tgl_lahir, jenis_kelamin, foto, action, created_at)
        VALUES (NEW.user, NEW.email, NEW.nama, NEW.alamat_tinggal, NEW.alamat_domisili, NEW.tempat_lahir, NEW.tgl_lahir, NEW.jenis_kelamin, NEW.foto, "insert", NOW());
        END
        ');

        /* log_update_profile */
        DB::unprepared('
        CREATE TRIGGER log_update_profile
        AFTER UPDATE ON user_profiles
        FOR EACH ROW
        BEGIN
        INSERT INTO log_profiles(user, email, nama, alamat_tinggal, alamat_domisili, tempat_lahir, tgl_lahir, jenis_kelamin, foto, action, created_at)
        VALUES (NEW.user, NEW.email, NEW.nama, NEW.alamat_tinggal, NEW.alamat_domisili, NEW.tempat_lahir, NEW.tgl_lahir, NEW.jenis_kelamin, NEW.foto, "update", NOW());
        END
        ');
        
        /* log_delete_profile */
        DB::unprepared('
        CREATE TRIGGER log_delete_profile
        AFTER DELETE ON user_profiles
        FOR EACH ROW
        BEGIN
        INSERT INTO log_profiles(user, email, nama, alamat_tinggal, alamat_domisili, tempat_lahir, tgl_lahir, jenis_kelamin, foto, action, created_at)
        VALUES (NEW.user, NEW.email, NEW.nama, NEW.alamat_tinggal, NEW.alamat_domisili, NEW.tempat_lahir, NEW.tgl_lahir, NEW.jenis_kelamin, NEW.foto, "delete", NOW());
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER log_insert_profile');
        DB::unprepared('DROP TRIGGER log_update_profile');
        DB::unprepared('DROP TRIGGER log_delete_profile');
    }
};
