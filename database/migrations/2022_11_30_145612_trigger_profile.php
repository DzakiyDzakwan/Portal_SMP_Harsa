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
        INSERT INTO log_profiles(profile_id, n_email, n_nama, n_alamat, jenis_kelamin, n_foto, keterangan, created_at)
        VALUES (NEW.profile_id, NEW.email, NEW.nama, NEW.alamat, NEW.jenis_kelamin, NEW.foto, "insert", NOW());
        END
        ');

        /* log_update_profile */
        DB::unprepared('
        CREATE TRIGGER log_update_profile
        AFTER UPDATE ON user_profiles
        FOR EACH ROW
        BEGIN
        INSERT INTO log_profiles(profile_id, n_email, o_email, n_nama, o_nama, n_alamat, o_alamat, jenis_kelamin, n_foto, o_foto, keterangan, created_at)
        VALUES (OLD.profile_id, NEW.email, OLD.email, NEW.nama, OLD.nama, NEW.alamat, OLD.alamat, OLD.jenis_kelamin, NEW.foto, OLD.foto, "update", NOW());
        END
        ');
        
        /* log_delete_profile */
        DB::unprepared('
        CREATE TRIGGER log_delete_profile
        AFTER DELETE ON user_profiles
        FOR EACH ROW
        BEGIN
        INSERT INTO log_profiles(profile_id, o_email, o_nama, o_alamat, jenis_kelamin, o_foto, keterangan, created_at)
        VALUES (OLD.profile_id, OLD.email, OLD.nama, OLD.alamat, OLD.jenis_kelamin, OLD.foto, "delete", NOW());
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
