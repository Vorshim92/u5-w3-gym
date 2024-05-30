<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function adminUserEdit(User $user)
    {
        return view('profile.edit', [
            'user' => $user,
        ]);
    }
    public function adminShow(User $user)
    {

        // Verifica se l'utente ha dei corsi alla quale è sottoscritto (al di là dello status)
        // $pendingCourses = $user->courses()->wherePivot('status', 'pending')->get();

        $courses = $user->courses;

        // Passa i dati alla vista
        return view('admin.show', compact('user', 'courses'));
    }

    public function updateStatus(Request $request, User $user, Course $course, $status)
    {
        // Verifica che il nuovo stato sia valido
        if (!in_array($status, ['pending', 'accepted', 'rejected'])) {
            return redirect()->back()->with('error', 'Stato non valido');
        }

        // Aggiorna lo stato della prenotazione
        $user->courses()->updateExistingPivot($course->id, ['status' => $status]);

        return redirect()->back()->with('status', 'Stato della prenotazione aggiornato');
    }
    public function destroy(Request $request, User $user, Course $course)
    {
        // Aggiorna lo stato della prenotazione
        $user->courses()->detach($course->id);
        return redirect()->back()->with('status', 'Prenotazione cancellata');
    }
}
