<?php

namespace App\Imports;

use App\Models\Group;
use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MembersImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $group = Group::where('namagroup', $row['group'])->firstOrCreate(['namagroup' => $row['group']]);

        return new Member([
            'memberid' => $row['member_id'],
            'groupid' => $group->groupid,
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'hp' => $row['hp'],
            'email' => $row['email'],
        ]);
    }

    public function batchSize(): int
    {
        return 250;
    }

    public function chunkSize(): int
    {
        return 250;
    }
    
}
