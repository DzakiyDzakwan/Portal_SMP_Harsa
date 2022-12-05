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
        /* log_insert_user */
        DB::unprepared('
        CREATE TRIGGER log_insert_user
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
        INSERT INTO log_users(uuid, n_username, n_password, role, keterangan, created_at)
        VALUES (NEW.uuid, NEW.username, NEW.password, NEW.role, "insert", NOW());
        END
        ');

        /* log_update_user */
        DB::unprepared('
        CREATE TRIGGER log_update_user
        AFTER UPDATE ON users
        FOR EACH ROW
        BEGIN
        INSERT INTO log_users(uuid, n_username, o_username, n_password, o_password, role, keterangan, created_at)
        VALUES (OLD.uuid, NEW.username, OLD.username, NEW.password, OLD.password, OLD.role, "update", NOW());
        END
        ');

        /* log_delete_user */
        DB::unprepared('
        CREATE TRIGGER log_delete_user
        AFTER DELETE ON users
        FOR EACH ROW
        BEGIN
        INSERT INTO log_users(uuid, o_username, o_password, role, keterangan, created_at)
        VALUES (OLD.uuid, OLD.username, OLD.password, OLD.role, "delete", NOW());
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
        DB::unprepared('DROP TRIGGER log_insert_user');
        DB::unprepared('DROP TRIGGER log_update_user');
        DB::unprepared('DROP TRIGGER log_delete_user');
    }
};
