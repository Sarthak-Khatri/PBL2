<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\TestSession;
use App\Models\Notification;

class StudentController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();

        $problemsSolved = Submission::where('user_id', $user->id)
            ->where('status', 'accepted')
            ->distinct('problem_id')
            ->count();

        $testsTaken = TestSession::where('user_id', $user->id)
            ->whereNotNull('submitted_at')
            ->count();

        $avgScore = TestSession::where('user_id', $user->id)
            ->whereNotNull('score')
            ->avg('score');

        $notifications = Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->latest()
            ->take(5)
            ->get();

        return response()->json([
            'user'            => $user,
            'problems_solved' => $problemsSolved,
            'tests_taken'     => $testsTaken,
            'avg_score'       => round($avgScore ?? 0, 1),
            'xp_points'       => $user->xp_points,
            'streak'          => $user->streak,
            'notifications'   => $notifications,
        ]);
    }

    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'    => 'sometimes|string|max:255',
            'college' => 'sometimes|string',
            'branch'  => 'sometimes|string',
            'year'    => 'sometimes|string',
        ]);

        $user = $request->user();
        $user->update($request->only([
            'name', 'college', 'branch', 'year'
        ]));

        return response()->json([
            'message' => 'Profile updated successfully',
            'user'    => $user
        ]);
    }
}