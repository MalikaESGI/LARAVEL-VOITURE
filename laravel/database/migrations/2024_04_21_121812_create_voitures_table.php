<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('model');
            $table->string('plaque_dimmatriculation');
            $table->integer('nombre_de_place');
            $table->integer('prix_location_journalier');

            // Ajouter cette ligne pour créer la colonne `category_id` avant de définir la clé étrangère
            $table->unsignedBigInteger('category_id')->nullable();

            // Ensuite, définir la clé étrangère
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
 
            $table->boolean('reserver')->default(false);
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
