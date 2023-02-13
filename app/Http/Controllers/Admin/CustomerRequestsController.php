<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerRequest;
use Illuminate\Http\Request;

class CustomerRequestsController extends Controller
{
    public function index()
    {
        $customer_requests = CustomerRequest::query()
            ->with('theme')
            ->latest()
            ->paginate(15);
        return view('admin.customer-requests.index', compact('customer_requests'));
    }

    public function destroy($id)
    {
        $customer_request = CustomerRequest::findOrFail($id);
        $customer_request->delete();
        return back()->with('flash_message', 'Заявка удалена!');
    }
}
