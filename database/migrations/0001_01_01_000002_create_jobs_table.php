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
        Schema::create('produck', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama produk
            $table->string('kode_produk')->unique(); // Kode unik produk (barcode atau SKU)
            $table->decimal('harga_jual', 15, 2); // Harga jual produk
            $table->decimal('harga_beli', 15, 2)->nullable(); // Harga beli produk (jika diperlukan)
            $table->integer('stok')->default(0); // Jumlah stok produk
            $table->string('satuan')->nullable(); // Satuan produk (misalnya pcs, kg)
            $table->string('kategori')->nullable(); // Kategori produk
            $table->string('gambar')->nullable(); // Path ke gambar produk
            $table->boolean('status')->default(true); // Status produk (aktif atau tidak)
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
