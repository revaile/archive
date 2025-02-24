<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        $allowedCategories = ['kp', 'proposal', 'skripsi','mbkm','proposal_bersama','artikel','magang'];
    
        if (!in_array($category, $allowedCategories)) {
            abort(404); // Jika kategori tidak valid, kembalikan halaman 404
        }
    
        // Ambil email pengguna yang sedang login
        $email = Auth::user()->email ?? null;
    
        // Kirim variabel ke view
        return view("pages.user.mydocuments.$category.create", compact('category', 'email'));
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
        'bab2' => 'nullable|file|mimes:pdf|max:51200', // Bab 2 opsional
        'bab3' => 'nullable|file|mimes:pdf|max:51200', // Bab 3 opsional
        'bab4' => 'nullable|file|mimes:pdf|max:51200', // Bab 4 opsional
        'bab5' => 'nullable|file|mimes:pdf|max:51200', // Bab 4 opsional
        'persyaratan' => 'required|array', // Validasi array untuk persyaratan
        'persyaratan.*' => 'file|mimes:pdf,doc,docx|max:51200', // Setiap file dalam array harus valid
        'persyaratan_2' => 'nullable|array', // Validasi array untuk persyaratan_2
        'persyaratan_2.*' => 'file|mimes:pdf,doc,docx|max:51200', // Setiap file dalam array harus valid untuk persyaratan_2
        'link' => 'nullable|url|max:2048', // Validasi untuk link (opsional, harus URL)

    ]);

    // Simpan file utama di folder 'documents' di disk 'public'
    $filePath = $request->file('file')->store('documents', 'public');

    // Simpan cover jika diberikan
    $coverPath = $request->hasFile('cover')
        ? $request->file('cover')->store('covers', 'public')
        : null;

    // Simpan file Bab 2 jika diberikan
    $bab2Path = $request->hasFile('bab2')
        ? $request->file('bab2')->store('bab2', 'public')
        : null;

    // Simpan file Bab 3 jika diberikan
    $bab3Path = $request->hasFile('bab3')
        ? $request->file('bab3')->store('bab3', 'public')
        : null;

    // Simpan file Bab 4 jika diberikan
    $bab4Path = $request->hasFile('bab4')
        ? $request->file('bab4')->store('bab4', 'public')
        : null;

        $bab5Path = $request->hasFile('bab5')
        ? $request->file('bab5')->store('bab5', 'public')
        : null;
    
             // Simpan dokumen persyaratan (array)
    $persyaratanPaths = [];
    foreach ($request->file('persyaratan') as $persyaratanFile) {
        $persyaratanPaths[] = $persyaratanFile->store('persyaratan', 'public');
    }   
    
    $persyaratan2Paths = [];
    if ($request->has('persyaratan_2')) {
        foreach ($request->file('persyaratan_2') as $persyaratanFile2) {
            $persyaratan2Paths[] = $persyaratanFile2->store('persyaratan_2', 'public');
        }
    }


    $link = $request->link ?? null;

    // Simpan data ke database
    Documents::create([
        'title' => $request->title,
        'category' => $request->category,
        'file_path' => $filePath,
        'status' => 'pending', // Status default untuk pengguna biasa
        'submission_date' => now(),
        'cover' => $coverPath, // Simpan path cover jika ada
        'bab2' => $bab2Path, // Simpan path Bab 2 jika ada
        'bab3' => $bab3Path, // Simpan path Bab 3 jika ada
        'bab4' => $bab4Path, // Simpan path Bab 4 jika ada
        'review_date' => now(),
        'description' => $request->description,
        'year' => $request->year ?? now()->year, // Default ke tahun sekarang jika tidak diisi
        'nim' => $request->nim,
        'user_id' => Auth::id(),
        'bab5' => $bab5Path, // Simpan path Bab 4 jika ada
        'persyaratan' => json_encode($persyaratanPaths), // Simpan array file persyaratan sebagai JSON
        'persyaratan_2' => json_encode($persyaratan2Paths), // Simpan array file persyaratan_2 sebagai JS
        'link' => $link, // Simpan link ke database

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
        $persyaratanPaths = json_decode($document->persyaratan, true);
        $persyaratan2Paths = json_decode($document->persyaratan_2, true); // Decode persyaratan_2


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

        $persyaratanPaths = json_decode($document->persyaratan, true);
        $persyaratan2Paths = json_decode($document->persyaratan_2, true); 
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
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:51200', // File utama opsional
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // Cover opsional
            'bab2' => 'nullable|file|mimes:pdf|max:51200', // Bab 2 opsional
            'bab3' => 'nullable|file|mimes:pdf|max:51200', // Bab 3 opsional
            'bab4' => 'nullable|file|mimes:pdf|max:51200', // Bab 4 opsional
            'bab5' => 'nullable|file|mimes:pdf|max:51200', // Bab 4 
            'persyaratan' => 'nullable|array', // Validasi array untuk persyaratan
            'persyaratan.*' => 'file|mimes:pdf,doc,docx|max:51200', // Setiap file dalam array harus valid
            'persyaratan_2' => 'nullable|array', // Validasi array untuk persyaratan
            'persyaratan_2.*' => 'file|mimes:pdf,doc,docx|max:51200', // Setiap file dalam array harus valid
            'link' => 'nullable|url|max:2048', // Validasi untuk link (opsional, harus URL)

        ]);
    
        // Perbarui file utama jika ada
        $filePath = $document->file_path;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents', 'public');
        }
    
        // Perbarui cover jika ada
        $coverPath = $document->cover;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }
    
        // Perbarui file Bab 2 jika ada
        $bab2Path = $document->bab2;
        if ($request->hasFile('bab2')) {
            $bab2Path = $request->file('bab2')->store('bab2', 'public');
        }
    
        // Perbarui file Bab 3 jika ada
        $bab3Path = $document->bab3;
        if ($request->hasFile('bab3')) {
            $bab3Path = $request->file('bab3')->store('bab3', 'public');
        }
    
        // Perbarui file Bab 4 jika ada
        $bab4Path = $document->bab4;
        if ($request->hasFile('bab4')) {
            $bab4Path = $request->file('bab4')->store('bab4', 'public');
        }

        $bab5Path = $document->bab5;
        if ($request->hasFile('bab5')) {
            $bab5Path = $request->file('bab5')->store('bab5', 'public');
        }

        // Update persyaratan
        $persyaratanPaths = json_decode($document->persyaratan, true) ?? [];
        if ($request->hasFile('persyaratan')) {
            foreach ($request->file('persyaratan') as $index => $persyaratanFile) {
                // Hapus file lama jika ada
                if (isset($persyaratanPaths[$index])) {
                    Storage::disk('public')->delete($persyaratanPaths[$index]);
                }
                // Simpan file baru di posisi indeks yang sama
                $persyaratanPaths[$index] = $persyaratanFile->store('persyaratan', 'public');
            }
        }
        // Filter elemen kosong
        $persyaratanPaths = array_filter($persyaratanPaths);
         
          // Update persyaratan_2
        $persyaratan2Paths = json_decode($document->persyaratan_2, true) ?? [];
        if ($request->hasFile('persyaratan_2')) {
            foreach ($request->file('persyaratan_2') as $index => $persyaratan2File) {
                if (isset($persyaratan2Paths[$index])) {
                    Storage::disk('public')->delete($persyaratan2Paths[$index]);
                }
                $persyaratan2Paths[$index] = $persyaratan2File->store('persyaratan_2', 'public');
            }
        }
        $persyaratan2Paths = array_filter($persyaratan2Paths); // Filter elemen kosong
        

        $link = $request->link ?? null;

    
        // Update dokumen di database
        $document->update([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year ?? now()->year, // Default ke tahun sekarang jika tidak diisi
            'file_path' => $filePath,
            'cover' => $coverPath,
            'bab2' => $bab2Path,
            'bab3' => $bab3Path,
            'bab4' => $bab4Path,
            'bab5' => $bab5Path,
            'persyaratan' => json_encode($persyaratanPaths),
            'persyaratan_2' => json_encode($persyaratan2Paths),
            'link' => $link, // Simpan link ke database

        ]);
    
        return redirect()->route('user.mydocuments.index')->with('success', 'Document updated successfully.');
    }
    

}
