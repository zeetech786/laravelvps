<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UserImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'first_name'    => $row[0],
            'last_name'     => $row[1],
            'email'          => $row[2],

        ]);
    }
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

}
