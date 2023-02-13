<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query()
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('unique_id', 'like', '%' . $request->search . '%')
                    ->orWhereHas('user', fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            )
            ->when(
                $request->has('user_id') && $request->filled('user_id'),
                fn($q) => $q->whereHas('user', fn($q) => $q->where('id', $request->user_id))
            )
            ->when(
                $request->has('not_paid') && $request->filled('not_paid') && $request->not_paid,
                fn($q) => $q->where('status', 0)
            )
            ->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.orders.show', compact('order'));
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
        $order = Order::find($id);
        $order->delete();
        return back()->with('flash_message', 'Заказ удален!');
    }
}
