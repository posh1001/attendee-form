<?php

// app/Imports/AttendeeImport.php
namespace App\Imports;

use App\Models\Attendee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class AttendeeImport implements ToModel, WithHeadingRow, WithChunkReading, WithEvents
{
    use RegistersEventListeners;

    private $importedRows = 0;

    public function model(array $row)
    {
        $this->importedRows++;
        
        // Clean and prepare data
        $phoneNumber = preg_replace('/[^0-9]/', '', $row['phone_number'] ?? '');
        $email = !empty($row['email']) ? strtolower(trim($row['email'])) : null;
        $church = !empty($row['church']) ? trim($row['church']) : null;

        $volunteerFunctions = !empty($row['volunteer_functions']) 
            ? json_encode(array_map('trim', explode(',', $row['volunteer_functions'])))
            : null;

        return new Attendee([
            'title'               => $this->normalizeTitle($row['title'] ?? null),
            'first_name'          => trim($row['first_name'] ?? ''),
            'surname'             => trim($row['surname'] ?? ''),
            'email'               => $email,
            'phone_number'        => $phoneNumber ?: null,
            'kingschat_handle'    => trim($row['kingschat_handle'] ?? ''),
            'group_church'        => trim($row['group_church'] ?? ''),
            'church'              => $church,
            'attendance_status'   => trim($row['attendance_status'] ?? ''),
            'volunteer_functions' => $volunteerFunctions,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function getImportedRowCount(): int
    {
        return $this->importedRows;
    }

    protected function normalizeTitle(?string $title): ?string
    {
        if (empty($title)) {
            return null;
        }

        $title = strtolower(trim($title));
        
        $mappings = [
            'mr' => 'Mr',
            'master' => 'Mr',
            'bro' => 'Brother',
            'brother' => 'Brother',
            'mrs' => 'Mrs',
            'miss' => 'Miss',
            'ms' => 'Ms',
            'sis' => 'Sister',
            'sister' => 'Sister',
            'mts' => 'Sister',
        ];

        return $mappings[$title] ?? ucfirst($title);
    }
}