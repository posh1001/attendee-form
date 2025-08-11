<?php

namespace App\Imports;

// app/Imports/AttendeeImport.php
namespace App\Imports;

use App\Models\Attendee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class AttendeeImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        return new Attendee([
            'title'               => $row['title'] ?? null,
            'first_name'          => $row['first_name'] ?? null,
            'surname'             => $row['surname'] ?? null,
            'phone_number'        => $row['phone_number'] ?? null,
            'kingschat_handle'    => $row['kingschat_handle'] ?? null,
            'group_church'        => $row['group_church'] ?? null,
            'attendance_status'   => $row['attendance_status'] ?? null,
            'volunteer_functions' => $row['volunteer_functions'] ?? null,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}

