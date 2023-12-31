<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'phone' => $row[1],
            'email' => $row[2],
        ]);
    }
}
