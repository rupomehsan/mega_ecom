<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\VatManagement\VatGroup\Database\create_vat_groups_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vat_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->float('percentage')->nullable();

            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vat_groups');
    }
};