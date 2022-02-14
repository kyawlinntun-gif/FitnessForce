<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::where('branch_id', 1)->orderBy('id', 'desc')->get();

        return Inertia::render('Leads/Index', [
            'leads' => $leads
        ]);
    }

    public function create()
    {
        return Inertia::render('Leads/Add');
    }

    public function store(Request $request)
    {
        $postData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits_between:1,11',
            'interested_package' => 'nullable|string',
            'dob' => 'required|date'
        ]);

        Lead::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'],
            'interested_package' => $postData['interested_package'],
            'dob' => $postData['dob'],
            'age' => 1,
            'branch_id' => 1,
            'added_by' => Auth::user()->id
        ]);

        return redirect(url('/dashboard'));
    }
}
