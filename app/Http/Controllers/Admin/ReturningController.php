<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Returning;
use Illuminate\Http\Request;

class ReturningController extends Controller
{
    public function index()
    {
        $returnings = Returning::paginate(10);
        return view('admin.returnings.index', compact('returnings'));
    }

    public function edit($id)
    {
        $returning = Returning::query()->findOrFail($id);
        $order = Order::query()->where('unique_id', $returning->order_number)->firstOrFail();
        return view('admin.returnings.edit', compact('returning', 'order'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'comment' => 'string',
            'status' => 'required|in:5,7',
        ]);

        $returning = Returning::query()->findOrFail($id);
        $order = Order::query()->where('unique_id', $returning->order_number)->firstOrFail();

        $returning->update([
            'comment' => $data['comment']
        ]);
        $order->update([
            'status' => $data['status']
        ]);

        return redirect()->route('admin.returnings.index')->with('flash_message', 'Заявка #' . $returning->id . 'изменена!');
    }
}
