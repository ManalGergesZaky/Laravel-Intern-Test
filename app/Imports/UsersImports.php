<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserImports implements ToModel, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id'             => $row[0],
            'full_name'      => $row[1],
            'phone_number'   => $row[2],
            'email'          => $row[3],
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
