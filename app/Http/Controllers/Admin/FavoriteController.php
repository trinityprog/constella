<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $favorites = Favorite::query()
            ->with(['user', 'product'])
            ->when(
                $request->has('user_id') && $request->filled('user_id'),
                fn($q) => $q->whereHas('user', fn($q) => $q->where('id', $request->user_id))
            )
            ->paginate(15);

        return view('admin.favorites.index', compact('favorites'));
    }
}
