<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daks', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('letter_from')->nullable();
            $table->date('received_date')->nullable();
            $table->string('letter_number')->nullable();
            $table->string('reference_number')->nullable();
            $table->text('subject')->nullable();
            $table->string('sent_to')->nullable();
            $table->text('sender_details')->nullable();
            $table->string('attachment')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->default('Pending');
            $table->string('remark')->nullable();
            $table->date('status_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daks', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
