<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::table('femelles', function (Blueprint $table) {
            $table->enum('etat', ['Active','Gestante','Allaitante','Vide'])->default('Active')->after('origine');
        });
    }

    public function down()
    {
        Schema::table('femelles', function (Blueprint $table) {
            $table->dropColumn('etat');
        });
    }

};
