<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Geoma;
use Illuminate\Http\Request;

class GeomaController extends Controller
{
    public function index(Request $request)
    {
        $geoma = Geoma::query()
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
            )
            ->paginate(15);
        return view('admin.geoma.index', compact('geoma'));
    }

    public function show($id)
    {
        $geoma = Geoma::find($id);
        return view('admin.geoma.show', compact('geoma'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $geoma = Geoma::find($id);
        $geoma->delete();
        return back()->with('flash_message', 'Заявка удалена!');
    }
}
