<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReminderController extends Controller
{
    public function create(Lead $lead)
    {
        return Inertia::render('Leads/LeadReminderAdd', [
            'lead' => $lead
        ]);
    }

    public function store(Lead $lead, Request $request)
    {
        $postData = $request->validate([
            'reminder' => 'required|string|min:3',
            'reminder_date' => 'required|date'
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['status'] = 'pending';

        $lead->reminders()->create($postData);

        return redirect()->route('lead.show', $lead);
    }

    public function show(Lead $lead, Reminder $reminder)
    {
        $reminder = $lead->reminders()->where('id', $reminder->id)->get();

        return Inertia::render('Leads/LeadReminderView', [
            'lead' => $lead,
            'reminderProp' => $reminder
        ]);
    }

    public function update(Lead $lead, Reminder $reminder, Request $request)
    {
        $postData = $request->validate([
            'reminder' => 'required|string|min:3',
            'reminder_date' => 'required|date'
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['status'] = 'completed';

        $lead->reminders()->where('id', $reminder->id)->update($postData);

        return redirect(url('/leads/'. $lead->id .'/reminders/add'));
    }
}
