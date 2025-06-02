<?php

namespace App\Http\Controllers;

use App\Models\AdminDashboard;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalEvents = Event::count();

        return view('admin.dashboard', compact('totalUsers', 'totalEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminDashboardController $adminDashboardController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminDashboardController $adminDashboardController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminDashboardController $adminDashboardController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminDashboardController $adminDashboardController)
    {
        //
    }
}
