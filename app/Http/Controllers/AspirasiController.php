<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $aspirasi = Aspirasi::with('user', 'kategori')->latest()->paginate(12);
            return view('aspirasi.index_admin', compact('aspirasi'));
        }

        $aspirasi = Aspirasi::with('kategori')->where('user_id', Auth::id())->latest()->paginate(10);
        return view('aspirasi.index', compact('aspirasi'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        return view('aspirasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        Aspirasi::create($validated);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil diajukan.');
    }

    public function show(Aspirasi $aspirasi)
    {
        $this->authorizeAspirasi($aspirasi);

        return view('aspirasi.show', compact('aspirasi'));
    }

    public function edit(Aspirasi $aspirasi)
    {
        $this->authorizeAspirasi($aspirasi);

        $kategori = Kategori::orderBy('nama_kategori')->get();
        return view('aspirasi.edit', compact('aspirasi', 'kategori'));
    }

    public function update(Request $request, Aspirasi $aspirasi)
    {
        $this->authorizeAspirasi($aspirasi);

        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $aspirasi->update($validated);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil diperbarui.');
    }

    public function destroy(Aspirasi $aspirasi)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi telah dihapus.');
    }

    public function updateStatus(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai',
        ]);

        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $aspirasi->status = $request->status;
        $aspirasi->save();

        return redirect()->back()->with('success', 'Status aspirasi diperbarui.');
    }

    protected function authorizeAspirasi(Aspirasi $aspirasi)
    {
        if (Auth::user()->role === 'admin') {
            return true;
        }

        if ($aspirasi->user_id !== Auth::id()) {
            abort(403);
        }

        return true;
    }
}
