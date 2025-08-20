<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Nilai;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Auth::check() || Auth::user()->role !== 'admin') {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    // ========================
    // Dashboard Admin
    // ========================
    public function dashboard()
    {
        $jumlahGuru = User::where('role', 'guru')->count();
        $jumlahSiswa = User::where('role', 'siswa')->count();

        $lastLogins = User::orderBy('last_login', 'desc')->get();

        $loginData = ['labels' => [], 'data' => []];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->toDateString();
            $loginData['labels'][] = Carbon::parse($date)->translatedFormat('d M');
            $loginData['data'][] = User::whereDate('last_login', $date)->count();
        }

        return view('admin.dashboard', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'lastLogins',
            'loginData'
        ));
    }

    // ========================
    // Kelola Akun
    // ========================
    public function kelolaAkun()
    {
        $users = User::all();
        return view('admin.kelola_akun', compact('users'));
    }

    public function editAkun($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_akun', compact('user'));
    }

    public function updateAkun(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,guru,siswa',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.kelola-akun')->with('success', 'Akun berhasil diperbarui.');
    }

    public function deleteAkun($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.kelola-akun')->with('success', 'Akun berhasil dihapus.');
    }

    // ========================
    // Rekap Nilai & Export Excel
    // ========================
    public function rekap()
    {
        $rekapNilai = Nilai::with(['siswa', 'guru'])->get();
        return view('admin.rekap', compact('rekapNilai'));
    }

    public function exportExcel()
    {
        return Excel::download(new UserExport, 'rekap_nilai.xlsx');
    }
}
