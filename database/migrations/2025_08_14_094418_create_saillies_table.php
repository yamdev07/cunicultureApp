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
        Schema::create('saillies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('femelle_id')->constrained('femelles')->onDelete('cascade');
            $table->foreignId('male_id')->constrained('males')->onDelete('cascade');
            $table->date('date_saillie');
            $table->date('date_palpage')->nullable();
            $table->enum('palpation_resultat', ['+','-'])->nullable();
            $table->date('date_mise_bas_theorique')->nullable(); // <- colonne manquante
            $table->timestamps();
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saillies');
    }
};
