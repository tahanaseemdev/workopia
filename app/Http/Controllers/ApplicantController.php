<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    // @desc Store new job application
    // @route POST /jobs/{job}/apply
    public function store(Request $request, Job $job): RedirectResponse
    {
        $existingApplication = Applicant::where('job_id', $job->id)->where('user_id', auth()->id())->exists();
        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to this job');
        }
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'string',
            'contact_email' => 'email|required|string',
            'message' => 'string',
            'location' => 'string',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }
        $application = new Applicant($validatedData);
        $application['job_id'] = $job->id;
        $application->user_id = auth()->id();
        $application->save();

        return redirect()->back()->with('success', 'Your application has been submitted!');
    }

    // @desc Delete job applicant
    // @route DELETE /applicant/{applicant}
    public function destroy($id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);
        Storage::disk('public')->delete($applicant->resume_path);
        $applicant->delete();


        return redirect()->back()->with('success', 'Applicant deleted successfully!');
        // return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully!');
    }
}
