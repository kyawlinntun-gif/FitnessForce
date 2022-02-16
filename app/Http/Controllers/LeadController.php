<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    private $validator;

    public function __construct()
    {
        $this->validator = [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits_between:1,11',
            'interested_package' => 'sometimes|string',
            'dob' => 'required|date'
        ];
    }

    public function index()
    {
        $leads = Lead::where('branch_id', 1)->orderBy('id', 'desc')->get();

        return Inertia::render('Leads/Index', [
            'leads' => $leads
        ]);
    }

    public function show(Lead $lead)
    {
        return Inertia::render('Leads/View', [
            'leadProp' => $lead
        ]);
    }

    public function create()
    {
        return Inertia::render('Leads/Add');
    }

    public function store(Request $request)
    {
        $postData = $request->validate($this->validator);

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

        return redirect(url('/leads'));
    }

    public function update(Lead $lead, Request $request)
    {
        $postData = $request->validate($this->validator);

        $lead->update([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'],
            'interested_package' => $postData['interested_package'],
            'dob' => $postData['dob'],
            'age' => 1,
            'branch_id' => 1,
            'added_by' => Auth::user()->id
        ]);

        return redirect()->route('lead.show', Auth::user()->id);
    }
}
