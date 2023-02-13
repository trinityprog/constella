<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use function redirect;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'file' => 'required|file|mimes:doc,docx,pdf,xls,xlsx,txt',
            'careers_id' => 'exists:careers,id',
        ]);

        if($request->hasFile('file')) {
            $file = $request->file('file')->store('career/resumes', 'public');

            $data['file'] = $file;
        }

        Resume::create($data);

        return redirect(route('career.list'));
    }
}
