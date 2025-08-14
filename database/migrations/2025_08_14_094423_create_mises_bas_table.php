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
        Schema::create('mises_bas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('saillie_id')->constrained('saillies')->onDelete('cascade');
            $table->date('date_mise_bas'); // <- obligatoire
            $table->integer('nb_vivant')->default(0);
            $table->integer('nb_mort_ne')->default(0);
            $table->integer('nb_retire')->default(0);
            $table->integer('nb_adopte')->default(0);
            $table->date('date_sevrage')->nullable();
            $table->decimal('poids_moyen_sevrage', 5, 2)->nullable();
            $table->timestamps();
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mises_bas');
    }
};
