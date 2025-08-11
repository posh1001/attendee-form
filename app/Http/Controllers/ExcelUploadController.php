<?php

// app/Http/Controllers/ExcelUploadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AttendeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class ExcelUploadController extends Controller
{
    public function show()
    {
        return view('excel.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        ]);

        try {
            Excel::import(new AttendeeImport, $request->file('file'));
            return back()->with('success', 'Excel file imported successfully.');
        } catch (\Exception $e) {
            Log::error('Excel import failed: '.$e->getMessage());
            return back()->withErrors(['file' => 'Import failed: '.$e->getMessage()]);
        }
    }
}

