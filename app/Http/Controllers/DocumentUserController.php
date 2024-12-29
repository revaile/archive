<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentUserController extends Controller
{
    /**
     * Display a listing of the user's documents.
     */
    public function index()
    {
        // Ambil hanya dokumen yang terkait dengan pengguna yang sedang login
        $documents = Documents::where('user_id', Auth::id())->get();
    
        return view('pages.user.mydocuments.index', compact('documents'));
    }
    

    /**
     * Show the form for creating a new document.
     */
public function create($category)
{
    // Pastikan hanya kategori yang diizinkan
    $allowedCategories = ['kp', 'proposal', 'skripsi'];

    if (!in_array($category, $allowedCategories)) {
        abort(404); // Jika kategori tidak valid, kembalikan halaman 404
    }

    // Kirim variabel category ke view
    return view("pages.user.mydocuments.$category.create", compact('category'));
}


    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:51200', // 50MB limit
            'description' => 'required|string',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB limit untuk gambar
            'nim' => 'nullable|string|max:20',
        ]);

        // Simpan file di folder 'documents' di disk 'public'
        $filePath = $request->file('file')->store('documents', 'public');

             // Simpan cover jika diberikan
             $coverPath = $request->hasFile('cover')
             ? $request->file('cover')->store('covers', 'public')
             : null;

        // Simpan data ke database
        Documents::create([
            'title' => $request->title,
            'category' => $request->category,
            'file_path' => $filePath,
            'status' => 'pending', // Status default untuk pengguna biasa
            'submission_date' => now(),
            'cover' => $coverPath, // Simpan path cover jika ada
            'review_date' => now(),
            'description' => $request->description,
            'year' => $request->year ?? now()->year, // Default ke tahun sekarang jika tidak diisi
            'nim' => $request->nim,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user.mydocuments.index')->with('success', 'Document created successfully.');
    }

    /**
     * Display the specified document.
     */
    public function show(Documents $document)
    {
        // Pastikan pengguna hanya bisa melihat dokumen milik mereka
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('pages.user.documents.show', compact('document'));
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy(Documents $document)
    {
        // Pastikan pengguna hanya bisa menghapus dokumen milik mereka
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        $document->delete();

        return redirect()->route('user.mydocuments.index')->with('success', 'Document deleted successfully.');
    }

        /**
     * Show the form for editing the specified document.
     */
    public function edit(Documents $document)
    {
        // Pastikan pengguna hanya bisa mengedit dokumen milik mereka
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('pages.user.mydocuments.edit', compact('document'));
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, Documents $document)
    {
        // Pastikan pengguna hanya bisa mengupdate dokumen milik mereka
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'nim' => 'nullable|string|max:20',

        ]);

        $filePath = $document->file_path; // Gunakan file path lama jika tidak ada file baru
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents', 'public');
        }

        // Jika cover diunggah
        $coverPath = $document->cover; // Gunakan cover lama jika tidak ada file baru
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        // Update judul dokumen
        $document->update([
            'title' => $request->title,
            'review_date' => now(), // Tambahkan tanggal review ketika status diperbarui
            'description' => $request->description,
            'year' => $request->year ?? now()->year, // Default ke tahun sekarang jika tidak diisi
            'nim' => $request->nim,
            'file_path' => $filePath,
            'cover' => $coverPath,


        ]);

        return redirect()->route('user.mydocuments.index')->with('success', 'Document updated successfully.');
    }

}
