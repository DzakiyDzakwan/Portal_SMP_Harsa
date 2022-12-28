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
        DB::unprepared('
        CREATE TRIGGER log_insert_permission
        AFTER INSERT ON permissions
        FOR EACH ROW
        BEGIN
        INSERT INTO log_permissions(permission_id, name, guard_name, action, created_at)
        VALUES (NEW.id, NEW.name, NEW.guard_name, "insert", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_update_permission
        AFTER UPDATE ON permissions
        FOR EACH ROW
        BEGIN
        INSERT INTO log_permissions(permission_id, name, guard_name, action, created_at)
        VALUES (NEW.id, NEW.name, NEW.guard_name, "update", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER log_delete_permission
        AFTER DELETE ON permissions
        FOR EACH ROW
        BEGIN
        INSERT INTO log_permissions(permission_id, name, guard_name, action, created_at)
        VALUES (OLD.id, OLD.name, OLD.guard_name, "delete", NOW());
        END
        ');

        DB::unprepared('
        CREATE TRIGGER disable_update_permission 
	    BEFORE UPDATE ON permissions
	    FOR EACH ROW
	    BEGIN
            IF (OLD.id <> NEW.id OR OLD.guard_name <> NEW.guard_name) THEN
                SIGNAL SQLSTATE "45000"
                SET MESSAGE_TEXT = "Tidak dapat mengubah permission";
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
        DB::unprepared('DROP TRIGGER log_insert_permission');
        DB::unprepared('DROP TRIGGER log_update_permission');
        DB::unprepared('DROP TRIGGER log_delete_permission');
        DB::unprepared('DROP TRIGGER disable_update_permission');
    }
};
