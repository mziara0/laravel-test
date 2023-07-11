<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\WelcomeToUserJob;
use App\Imports\ImportUser;
use Maatwebsite\Excel\Facades\Excel;

class UploadExcelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        Excel::import(new ImportUser(), $request->file('file'));

        WelcomeToUserJob::dispatch();

        return back()->with('success', 'We will sent to all user as soon as we finish');
    }
}
