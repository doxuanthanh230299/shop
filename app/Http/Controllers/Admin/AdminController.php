<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {

        // $data = Order::whereBetween('updated_at', [$startDate, $endDate])->get();

        $result = DB::select(DB::raw("SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, SUM(total) AS total_per_month FROM orders GROUP BY YEAR(created_at), MONTH(created_at)"));
        $currentMonthRevenue = DB::table('orders')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total');
        $month = Carbon::now()->month;
        $totalOrders = DB::table('orders')->count();
        $label = [];
        $data = [];
        foreach ($result as $val) {
            $label[] =  $val->month;
            $data[] = $val->total_per_month;
        }
        return view('backend/index', ['label' => json_encode($label, JSON_UNESCAPED_UNICODE), 'data' => json_encode($data), 'currentMonthRevenue' => $currentMonthRevenue, 'totalOrders' => $totalOrders, 'month' => $month]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
