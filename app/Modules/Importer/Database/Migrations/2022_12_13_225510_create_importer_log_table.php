<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateImporterLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('importer_log')) {
            Schema::create('importer_log', function (Blueprint $table) {
                $table->bigInteger('id')->autoIncrement();
                $table->integer('type')->default(1);
                $table->dateTime('run_at')->default(date("Y-m-d H:i:s"));
                $table->integer('entries_processed');
                $table->integer('entries_created');
            });
        }
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
    }
}
