<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PanelAdminController extends Controller
{
    public function index()
    {
        // Récupérer les admins et les organisateurs
        $admins = User::where('role_id', 1)->get();
        $organisateurs = User::where('role_id', 2)->get();

        // Retourner la vue paneladmin avec les données
        return view('admin.paneladmin', compact('admins', 'organisateurs'));
    }

    // Rétrograder un admin à participant
    public function removeAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $user->role_id = 3; // Rôle Participant
        $user->save();

        return redirect()->back()->with('success', 'Administrateur rétrogradé à participant.');
    }

    // Méthodes pour ajouter un admin ou organisateur
    public function addAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->role_id = 1; // Rôle admin
        $user->save();

        return redirect()->route('admin.paneladmin')->with('success', 'Administrateur ajouté avec succès');
    }

    public function addOrganisateur(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        if (User::where('email', $request->email)->first()->role_id == 2) {
            return redirect()->route('admin.paneladmin')->with('error', 'Cet utilisateur est déjà organisateur.');
        } else if (User::where('email', $request->email)->first()->role_id == 1) {
            return redirect()->route('admin.paneladmin')->with('error', 'Cet utilisateur est déjà administrateur.');
        }

        $user = User::where('email', $request->email)->first();
        $user->role_id = 2; // Rôle organisateur
        $user->save();

        return redirect()->route('admin.paneladmin')->with('success', 'Organisateur ajouté avec succès');
    }

    // Rétrograder un organisateur à participant
    public function removeOrganisateur($userId)
    {
        $user = User::findOrFail($userId);
        $user->role_id = 3; // Rôle Participant
        $user->save();

        return redirect()->back()->with('success', 'Organisateur rétrogradé à participant.');
    }

    public function showAddAdminForm()
    {
        return view('admin.addadmin');
    }

    public function showAddOrganisateurForm()
    {
        return view('admin.addorganisateur');
    }
}

