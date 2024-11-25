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
        Schema::table('tbw_taikais', function (Blueprint $table) {
            $table->string('gym', 50)->nullable()->after('city'); // 会場
            $table->string('file_name', 50)->nullable()->after('kaisai_date'); // ファイル名
            $table->string('file_extension', 10)->nullable()->after('file_name'); // ファイル拡張子
            $table->string('contact', 30)->nullable()->after('team'); // 連絡先
            $table->string('status', 20)->nullable()->after('tier'); // ステータス
            $table->string('others', 200)->nullable()->after('status'); // その他
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbw_taikais', function (Blueprint $table) {
            $table->dropColumn(['gym', 'file_name', 'file_extension', 'contact', 'status','others']);
        });
    }
};
