<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Tumbler;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MonthlySalesExport;

class  AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function customer(){
        $users=User::where('type','user')->paginate(5);

        return view('Admin/Auth',compact('users'));
    }
    public function editRole($id){
        $users=User::find($id);
        if (!$users) {
            return redirect()->back()->with('error', 'User not found');
        }
        $users->type = $users->type == 0 ? 1 : 0; // Toggle between 0 and 1
        $users->save();
        return view('Admin/Auth',compact('users'));
    }
    public function updateRole(Request $request, User $user)
{
    $validated = $request->validate([
        'type' => 'required|integer|in:0,1',
    ]);

    $user->update($validated);

    return back()->with('success', 'User role updated successfully');
}
    public function deleteRole($id){
        $users=User::find($id);
        $users->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
    }
    public function index()
    {
        $tumblers=Tumbler::all();
        return view('pages/home',compact('tumblers'));
    }

    public function adminHome()
    {
        $users = User::all();
        $tumblers = Tumbler::get();
        $orders = \App\Models\Order::all(); // Get all orders
        $orderCount = $orders->count();     // Count orders

        return view('Admin.Dashboard', compact('users', 'tumblers', 'orderCount'));
    }

    public function Model(){
        return view('CRUD/Model_Crud/View_model');
    }
    public function ListRole(Request $request)
    {
        $query = User::query();

        // Check if a search query is provided
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('username', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('type', 'like', "%$search%");
        }

        $users = $query->paginate(6); // Paginate the results
        return view('Admin/List_roles', compact('users'));
    }
    public function viewOrder()
    {
        $orders = Order::with('user')->latest()->get();
        return view('Admin.order', compact('orders'));
    }
    public function confirmOrder($orderId)
    {
        $order = \App\Models\Order::findOrFail($orderId);
        $order->status = 'completed';
        $order->save();
        return redirect()->back()->with('success', 'Order confirmed!');
    }
    public function rejectOrder($orderId)
    {
        $order = \App\Models\Order::findOrFail($orderId);
        $order->delete();
        return redirect()->back()->with('success', 'Order rejected and deleted!');
    }
    public function reportView(Request $request)
    {
        // Group orders by month and sum total
        $monthlySales = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total_sales, COUNT(*) as orders_count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('Admin.Report', compact('monthlySales'));
    }

    public function exportMonthlySales()
    {
        return Excel::download(new MonthlySalesExport, 'monthly_sales_report.xlsx');
    }
}
