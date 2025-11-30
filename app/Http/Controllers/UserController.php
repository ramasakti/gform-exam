<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use File;
use Storage;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UserController extends Controller
{
    public function index()
    {
        if (request('ruang')) {
            $dataSiswa = DB::table('users')->join('kelas', 'kelas.id_kelas', '=', 'users.kelas')->where('status', 'Siswa')->where('ruang', request('ruang'))->get();
        } else {
            $dataSiswa = DB::table('users')->join('kelas', 'kelas.id_kelas', '=', 'users.kelas')->where('status', 'Siswa')->orderBy('kelas', 'ASC')->get();
        }
        $dataGuru = DB::table('users')->where('status', '!=', 'Siswa')->get();
        return view('user', [
            'title' => 'Daftar User',
            'navactive' => 'user',
            'ai' => 1,
            'dataSiswa' => $dataSiswa,
            'dataGuru' => $dataGuru,
            'dataKelas' => DB::table('kelas')->get()
        ]);
    }

    public function store(Request $request)
    {
        if (!$request->kelas) {
            $request->kelas = '';
        }
        if (!$request->ruang) {
            $request->ruang = '';
        }
        DB::table('users')
            ->insert([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'nama' => $request->nama,
                'status' => $request->status,
                'kelas' => $request->kelas,
                'ruang' => $request->ruang,
                'log' => NULL,
            ]);
        return back()->with('success', 'Berhasil tambah user!');
    }

    public function update(Request $request, $username)
    {
        DB::table('users')
            ->where('username', $username)
            ->update([
                'kelas' => $request->kelas,
                'hit' => $request->hit
            ]);

        return back()->with('success', 'Berhasil update login!');
    }

    public function hit(Request $request)
    {
        DB::table('users')
            ->where('status', 'Siswa')
            ->update([
                'hit' => $request->hit
            ]);

        return back()->with('success', 'Berhasil update login!');
    }

    public function resetUser()
    {
        DB::table('users')->where('status', '!=', 'Admin')->delete();
        return back()->with('success', 'Berhasil reset user!');
    }

    public function resetLogin()
    {
        DB::table('users')->update(['log' => NULL]);
        return back()->with('success', 'Berhasil membersihkan log user!');
    }

    public function download()
    {
        $kelas = DB::table('kelas')->select('id_kelas', 'tingkat', 'paralel')->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $mainSheet = $spreadsheet->getActiveSheet();
        $mainSheet->setTitle('Template');

        // =============================================
        //  Hidden Sheet: kelas_ref
        // =============================================
        $lookupSheet = $spreadsheet->createSheet();
        $lookupSheet->setTitle('kelas_ref');

        // Header optional
        $lookupSheet->setCellValue('A1', 'ID_KELAS');
        $lookupSheet->setCellValue('B1', 'KELAS');

        $row = 2;
        foreach ($kelas as $k) {
            $lookupSheet->setCellValue("A{$row}", $k->id_kelas);
            $lookupSheet->setCellValue("B{$row}", "{$k->tingkat} {$k->paralel}");
            $row++;
        }

        // Hide sheet
        $lookupSheet->setSheetState(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::SHEETSTATE_HIDDEN);

        $kelasLastRow = $row - 1;

        // =============================================
        // HEADER COLUMN TEMPLATE
        // =============================================
        $headers = [
            'A1' => 'username',
            'B1' => 'password',
            'C1' => 'nama',
            'D1' => 'status',
            'E1' => 'kelas',
            'F1' => 'id_kelas',
            'G1' => 'ruang',
        ];

        foreach ($headers as $cell => $text) {
            $mainSheet->setCellValue($cell, $text);
        }

        // Set lebar kolom biar enak dibaca
        foreach (range('A', 'G') as $col) {
            $mainSheet->getColumnDimension($col)->setWidth(20);
        }

        // =============================================
        // DROPDOWN STATUS
        // =============================================
        $statusDv = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
        $statusDv->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $statusDv->setAllowBlank(false);
        $statusDv->setShowDropDown(true);
        $statusDv->setFormula1('"Admin,Siswa,Pengawas"');

        // =============================================
        // DROPDOWN KELAS (lookup dari kelas_ref)
        // =============================================
        $kelasDv = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
        $kelasDv->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $kelasDv->setAllowBlank(true);
        $kelasDv->setShowDropDown(true);
        $kelasDv->setFormula1("='kelas_ref'!\$B\$2:\$B\${$kelasLastRow}");

        // =============================================
        // APPLY DROPDOWN + FORMULA OTOMATIS
        // =============================================
        for ($i = 2; $i <= 500; $i++) {
            // Dropdown STATUS (kolom D)
            $mainSheet->getCell("D{$i}")->setDataValidation(clone $statusDv);

            // Dropdown KELAS (kolom E)
            $mainSheet->getCell("E{$i}")->setDataValidation(clone $kelasDv);

            // VLOOKUP ID_KELAS (kolom F)
            $mainSheet->setCellValue(
                "F{$i}",
                "=IF(E{$i}=\"\",\"\",IFERROR(INDEX('kelas_ref'!\$A\$2:\$A\${$kelasLastRow},MATCH(E{$i},'kelas_ref'!\$B\$2:\$B\${$kelasLastRow},0)),\"\"))"
            );
        }

        // =============================================
        // PROTECT SHEET
        // =============================================
        $mainSheet->getProtection()->setSheet(true);
        $mainSheet->getProtection()->setPassword('rahasia');

        // Kolom editable (username, password, nama, status, kelas, ruang)
        foreach (['A', 'B', 'C', 'D', 'E', 'G'] as $col) {
            $mainSheet->getStyle("{$col}2:{$col}500")
                ->getProtection()
                ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
        }

        // Kolom F (id_kelas) dikunci
        $mainSheet->getStyle("F2:F500")
            ->getProtection()
            ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

        // =============================================
        // OUTPUT FILE
        // =============================================
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $fileName = "Template_User_" . date('Ymd_His') . ".xlsx";

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'user' => 'required|mimes:xlsx'
        ]);

        $path = $request->file('user')->getRealPath();

        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();

        $errors = [];
        $success = [];

        // Mulai dari baris ke-2 karena baris 1 = header
        for ($i = 2; $i <= 500; $i++) {
            $username = trim($sheet->getCell("A{$i}")->getValue());
            $password = trim($sheet->getCell("B{$i}")->getValue());
            $nama     = trim($sheet->getCell("C{$i}")->getValue());
            $status   = trim($sheet->getCell("D{$i}")->getValue());
            $kelas    = trim($sheet->getCell("E{$i}")->getValue());
            $id_kelas = trim($sheet->getCell("F{$i}")->getCalculatedValue());
            $ruang    = trim($sheet->getCell("G{$i}")->getValue());

            // Jika baris kosong → skip
            if ($username === "" && $password === "" && $nama === "") {
                continue;
            }

            // ======== VALIDASI ========
            if (!$username) {
                $errors[] = "Baris {$i}: Username kosong.";
                continue;
            }

            if (!$password) {
                $errors[] = "Baris {$i}: Password kosong.";
                continue;
            }

            if (!$nama) {
                $errors[] = "Baris {$i}: Nama kosong.";
                continue;
            }

            if (!in_array($status, ['Admin', 'Siswa', 'Pengawas'])) {
                $errors[] = "Baris {$i}: Status tidak valid.";
                continue;
            }

            if (!$kelas) {
                $errors[] = "Baris {$i}: Kelas belum dipilih.";
                continue;
            }

            if (!$id_kelas) {
                $errors[] = "Baris {$i}: ID Kelas gagal terisi dari formula Excel.";
                continue;
            }

            // ======== INSERT DB ========
            try {
                DB::table('users')->insert([
                    'username' => $username,
                    'password' => bcrypt($password),
                    'nama'     => $nama,
                    'status'   => $status,
                    'kelas'    => $kelas,
                    'kelas'    => $id_kelas,
                    'ruang'    => $ruang,
                ]);

                $success[] = "Baris {$i}: Berhasil ditambahkan.";
            } catch (\Exception $e) {
                $errors[] = "Baris {$i}: Gagal menyimpan → " . $e->getMessage();
            }
        }

        return redirect()
            ->back()
            ->with('success', $success)
            ->with('errors', $errors);
    }
}
