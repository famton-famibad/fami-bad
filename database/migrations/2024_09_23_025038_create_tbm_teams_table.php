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
        Schema::create('tbm_teams', function (Blueprint $table) {
            $table->id(); // id カラム
            $table->string('team_name', 20)->nullable(); // チーム名
            $table->string('prefecture', 5); // 都道府県
            $table->string('city', 10)->nullable(); // 市区町村
            $table->text('practice_info')->nullable(); // 練習情報
            $table->string('file_name', 30)->nullable(); // ファイル名
            $table->string('file_extension', 10)->nullable(); // ファイル拡張子
            $table->string('delegate', 10)->nullable(); // 代表者
            $table->string('contact', 30)->nullable(); // 連絡先
            $table->string('sns1', 30)->nullable(); // SNS1
            $table->string('sns2', 30)->nullable(); // SNS2
            $table->string('sns3', 30)->nullable(); // SNS3
            $table->string('optional', 30)->nullable(); // 任意
            $table->integer('del_flg')->default(0); // 削除フラグ
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbm_teams');
    }
};
