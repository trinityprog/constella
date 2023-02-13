<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index(Request $request)
    {
        $colors = Color::query()
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('abbr', 'like', '%' . $request->search . '%')
                    ->orWhere('code', 'like', '%' . $request->search . '%')
            )
            ->paginate(10);
        return view('admin.colors.index', compact('colors'));
    }

    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);

        $color->update([
            'code' => $request->input('code'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'name_kz' => $request->input('name_kz'),
        ]);

        return redirect('/admin/colors');
    }
}
