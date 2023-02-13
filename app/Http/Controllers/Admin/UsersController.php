<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index (Request $request)
    {
        $users = User::query()
            ->withCount([
                'addresses',
                'favorites',
                'orders',
                'orders as not_paid_orders_count' => fn ($q) => $q->where('status', 0)
            ])
            ->where('role', 'user')
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('sex', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
            )
            ->paginate(15);
        return view('admin.users.index', compact('users'));
    }
}
