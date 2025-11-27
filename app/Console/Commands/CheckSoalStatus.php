<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CheckSoalStatus extends Command
{
    protected $signature = 'soal:check-status';
    protected $description = 'Matikan soal jika waktu aktif habis tepat waktunya';

    public function handle()
    {
        // Ambil soal yang masih aktif
        $soalAktif = DB::table('soal')->where('isactive', 1)->get();

        foreach ($soalAktif as $soal) {
            // Waktu mulai soal
            $waktuMulai = Carbon::parse($soal->tgl . ' ' . $soal->mulai);

            // Waktu seharusnya mati
            $waktuBerakhir = $waktuMulai->copy()->addMinutes($soal->menit_aktif);

            // Bandingkan hanya sampai level "menit"
            if (Carbon::now()->diffInMinutes($waktuBerakhir) === 0) {
                DB::table('soal')
                    ->where('id_soal', $soal->id_soal)
                    ->update([
                        'isactive' => 0,
                        'updated_at' => Carbon::now(),
                    ]);

                $this->info("Soal {$soal->id_soal} dimatikan tepat pada waktunya.");
            }
        }

        return Command::SUCCESS;
    }
}
