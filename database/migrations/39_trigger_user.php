<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        INSERT INTO log_users(uuid, username,password, action, created_at)
        VALUES (NEW.uuid, NEW.username, NEW.password, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_user
        AFTER UPDATE ON users
        FOR EACH ROW
        BEGIN
        IF (OLD.username <> NEW.username OR OLD.password <> NEW.password) THEN
            INSERT INTO log_users(uuid, username,password, action, created_at)
            VALUES (OLD.uuid, OLD.username, OLD.password, "update", NOW());
            END IF;
        END
        ');

        // DB::unprepared('
        // CREATE TRIGGER log_update_user
        // AFTER UPDATE ON users
        // FOR EACH ROW
        // IF (OLD.username <> NEW.username OR OLD.password <> NEW.password) THEN
        //     INSERT INTO log_users(uuid, username,password, action, created_at)
        //     VALUES (OLD.uuid, OLD.username, OLD.password, "update", NOW());
        //     END IF;
        // END
        // ');

        DB::unprepared('
        CREATE TRIGGER log_delete_user
        AFTER DELETE ON users
        FOR EACH ROW
        BEGIN
        INSERT INTO log_users(uuid, username,password, action, created_at)
        VALUES (OLD.uuid, OLD.username, OLD.password, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_softdelete_user
        AFTER UPDATE ON users
        FOR EACH ROW
	    BEGIN
            IF (NEW.deleted_at) THEN
            INSERT INTO log_users(uuid, username,password, action, created_at)
            VALUES (OLD.uuid, OLD.username, OLD.password, "softdelete", NOW());
            END IF;
	    END
        ');

        // DB::unprepared('
        // CREATE TRIGGER log_restore_user
        // AFTER UPDATE ON users
        // FOR EACH ROW
        // BEGIN
        //     IF (NEW.deleted_at is NULL) THEN
        //     INSERT INTO log_users(uuid, username,password, action, created_at)
        //     VALUES (OLD.uuid, OLD.username, OLD.password, "restore", NOW());
        //     END IF;
        // END
        // ');

        DB::unprepared('
        CREATE TRIGGER disable_update_user 
	    BEFORE UPDATE ON users
	    FOR EACH ROW
	    BEGIN
            IF (OLD.uuid <> NEW.uuid) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah role";
            END IF;
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
        DB::unprepared('DROP TRIGGER log_softdelete_user');
        DB::unprepared('DROP TRIGGER disable_update_user');
    }
};
