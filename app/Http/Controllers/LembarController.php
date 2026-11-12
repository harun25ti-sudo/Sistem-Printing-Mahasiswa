<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LembarController extends Controller
{
    // Interactive full app / preview
    public function index()
    {
        return view('lembar.index');
    }

    // Role: Buyer
    public function buyerHome()
    {
        return view('lembar.buyer.home');
    }

    public function buyerMarketplace()
    {
        return view('lembar.buyer.marketplace');
    }

    public function buyerOrders()
    {
        return view('lembar.buyer.orders');
    }

    public function buyerAddresses()
    {
        return view('lembar.buyer.addresses');
    }

    public function buyerProfile()
    {
        return view('lembar.buyer.profile');
    }

    // Role: Partner
    public function partnerDashboard()
    {
        return view('lembar.partner.dashboard', ['defaultRole' => 'partner']);
    }

    public function partnerIncoming()
    {
        return view('lembar.partner.incoming', ['defaultRole' => 'partner']);
    }

    public function partnerQueue()
    {
        return view('lembar.partner.queue', ['defaultRole' => 'partner']);
    }

    public function partnerServices()
    {
        return view('lembar.partner.services', ['defaultRole' => 'partner']);
    }

    public function partnerSchedule()
    {
        return view('lembar.partner.schedule', ['defaultRole' => 'partner']);
    }

    public function partnerRevenue()
    {
        return view('lembar.partner.revenue', ['defaultRole' => 'partner']);
    }

    // Role: Courier
    public function courierDashboard()
    {
        return view('lembar.courier.dashboard', ['defaultRole' => 'courier']);
    }

    public function courierTasks()
    {
        return view('lembar.courier.tasks', ['defaultRole' => 'courier']);
    }

    public function courierHistory()
    {
        return view('lembar.courier.history', ['defaultRole' => 'courier']);
    }

    // Role: Administrator
    public function adminDashboard()
    {
        return view('lembar.admin.dashboard', ['defaultRole' => 'admin']);
    }

    public function adminPartners()
    {
        return view('lembar.admin.partners', ['defaultRole' => 'admin']);
    }

    public function adminOrders()
    {
        return view('lembar.admin.orders', ['defaultRole' => 'admin']);
    }

    public function adminPayments()
    {
        return view('lembar.admin.payments', ['defaultRole' => 'admin']);
    }

    public function adminComplaints()
    {
        return view('lembar.admin.complaints', ['defaultRole' => 'admin']);
    }
}
