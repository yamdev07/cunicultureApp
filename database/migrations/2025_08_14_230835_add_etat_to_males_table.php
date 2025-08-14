<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('males', function (Blueprint $table) {
            $table->string('etat')->default('Active'); // valeurs possibles : Active, Gestante, Allaitante, Vide
        });
    }

    public function down(): void
    {
        Schema::table('males', function (Blueprint $table) {
            $table->dropColumn('etat');
        });
    }
};
