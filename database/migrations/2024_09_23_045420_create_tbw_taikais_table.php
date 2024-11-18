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
        Schema::create('tbw_taikais', function (Blueprint $table) {
            $table->id(); // id カラム
            $table->string('taikai_name', 60)->nullable(); // 大会名
            $table->string('prefecture', 5); // 都道府県
            $table->string('city', 20)->nullable(); // 市区町村
            $table->string('team', 30); // チーム名
            $table->date('kaisai_date'); // 開催日
            $table->integer('tier')->nullable(); // 大会のランクやティア（階層）
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbw_taikais');
    }
};
