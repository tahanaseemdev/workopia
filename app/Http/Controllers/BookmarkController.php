<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookmarkController extends Controller
{
    // @desc get all user bookmarks
    //  GET /bookmarks 
    public function index(): View
    {
        $user = Auth::user();
        $bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at', 'desc')->paginate(9);
        return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
    }

    // @desc create new bookmarked job
    //  POST /bookmarks/{job}
    public function store(Job $job): RedirectResponse
    {
        $user = Auth::user();

        if ($user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'Job is already bookmarked');
        }

        $user->bookmarkedJobs()->attach($job->id);
        return back()->with('success', 'Job bookmarked successfully!');
    }

    // @desc Remove bookmarked job
    //  DELETE /bookmarks/{job} 
    public function destroy(Job $job): RedirectResponse
    {
        $user = Auth::user();

        if (!$user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'Job is not bookmarked');
        }

        $user->bookmarkedJobs()->detach($job->id);
        return back()->with('success', 'Bookmark removed successfully!');
    }
}
