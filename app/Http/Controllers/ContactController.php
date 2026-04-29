<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    if (!session('admin')) {
        return redirect('/');
    }

    $query = Contact::query();

    // 🔍 FILTER SEARCH
    if ($request->filled('search')) {
        $search = strtolower($request->search);

        $query->where(function ($q) use ($search) {
            $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
              ->orWhereRaw('LOWER(nip) LIKE ?', ["%{$search}%"]);
        });
    }

    $contacts = $query->latest()->paginate(10);

    return view('admin.contact.index', compact('contacts'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validasi = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'nip' => 'required',
                'unit_kerja' => 'required',
                'jenis_perangkat' => 'required',
                'mac_address' => 'required'
            ]);

            Contact::create($validasi);

            // 🔥 INI YANG DIPAKAI UNTUK POPUP
            return back()->with('success', true);

        } catch (ValidationException $th) {
            return back()->withErrors(['error' => 'Gagal mengirim pengajuan']);
        }
    }

    /**
     * Reply email dari admin
     */
    public function reply(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validasi = $request->validate([
            'reply' => 'required'
        ]);

        $contact->update($validasi);

        // Kirim email balasan
        Mail::raw($request->reply, function ($message) use ($contact) {
            $message->to($contact->email)
                    ->subject('Reply from admin');
        });

        return back()->with('success', true);
    }

    /**
     * Optional method lain (tidak digunakan)
     */
    public function create() {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}