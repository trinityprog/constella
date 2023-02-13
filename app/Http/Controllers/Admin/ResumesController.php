<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Response;
use Storage;

class ResumesController extends Controller
{
    public function show($id)
    {
        $resume = Resume::with('careers')->findOrFail($id);

        return view('admin.resume.show', compact('resume'));
    }

    public function destroy($id)
    {
        $resumes = Resume::findOrFail($id);
        $resumes->delete();
        return back()->with('flash_message', 'Резюме удалено!');
    }
}
