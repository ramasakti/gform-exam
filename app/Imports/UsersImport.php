<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username' => $row[0],
            'password' => $row[1],
            'nama' => $row[2],
            'status' => $row[3],
            'kelas' => $row[4],
            'log' => NULL
        ]);
    }
}
