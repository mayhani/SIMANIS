<?

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateUploadBuktiTable extends Migration
{
    public function uploadbukti()
    {
        Schema::create('uploadbukti', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid()); // Pastikan UUID sebagai default
            $table->uuid('user_id'); // ID pengguna
            $table->enum('jenis_pajak', ['tahunan', '5_tahunan']); // Jenis pajak
            $table->string('file_path'); // Path file bukti pajak
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key jika diperlukan (sesuaikan dengan tabel pengguna)
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('uploadbukti');
    }
}
