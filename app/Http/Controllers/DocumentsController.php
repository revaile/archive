<?php


namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the documents.
     */
    public function index(Request $request)
    {
        // Ambil semua tahun unik dari tabel 'documents'
        $years = Documents::distinct()->pluck('year');
    
        // Query data dokumen
        $documentsQuery = Documents::query();
    
        // Filter dokumen berdasarkan pencarian umum
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $documentsQuery->where(function ($query) use ($search) {
                $query->where('title', 'ILIKE', "%$search%")
                    ->orWhere('nim', 'ILIKE', "%$search%")
                    ->orWhere('description', 'ILIKE', "%$search%");
            });
        }
    
        // Filter dokumen berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $documentsQuery->where('category', $request->category);
        }
    
        // Filter dokumen berdasarkan tahun
        if ($request->has('year') && $request->year != '') {
            $documentsQuery->where('year', $request->year);
        }
    
        // Filter dokumen berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $documentsQuery->where('status', $request->status);
        }

        // Ambil hasil pencarian dokumen dengan pagination
        $documents = $documentsQuery->with('user')->paginate(10);
    
        // Menghitung jumlah dokumen berdasarkan kategori
        $categories = Documents::select('category')
            ->selectRaw('count(*) as count')
            ->groupBy('category')
            ->get()
            ->keyBy('category');
    
        // Mengirim data ke view
        return view('pages.dashboard.documents.index', compact('documents', 'categories', 'years'));
    }
    

   

    public function page(Request $request)
{
    // Ambil semua tahun unik dari tabel 'documents'
    $years = Documents::distinct()->pluck('year');

    // Query data dokumen
    $documentsQuery = Documents::query();

    // Filter dokumen berdasarkan pencarian umum
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $documentsQuery->where(function ($query) use ($search) {
            $query->where('title', 'ILIKE', "%$search%")
                ->orWhere('nim', 'ILIKE', "%$search%")
                ->orWhere('description', 'ILIKE', "%$search%");
        });
    }
    

    // Filter dokumen berdasarkan kategori
    if ($request->has('category') && $request->category != '') {
        $documentsQuery->where('category', $request->category);
    }

    // Filter dokumen berdasarkan tahun
    if ($request->has('year') && $request->year != '') {
        $documentsQuery->where('year', $request->year);
    }

    // Ambil hasil pencarian dokumen dan load relasi user
    $documents = $documentsQuery
        ->select('id', 'nim', 'year', 'title', 'description', 'cover', 'category', 'user_id')
        ->with('user:id,email') // Pastikan relasi user di-load
        ->get();

    // Menghitung jumlah dokumen berdasarkan kategori
    $categories = Documents::select('category')
        ->selectRaw('count(*) as count')
        ->groupBy('category')
        ->get()
        ->keyBy('category');

    $categories = $categories->map(function ($item) {
        $item->title = ucfirst($item->category);
        return $item;
    });

    // Pisahkan dokumen berdasarkan kategori
    $kp = $documents->filter(function ($doc) {
        return strtolower($doc->category) === 'kp';
    });

    $proposals = $documents->filter(function ($doc) {
        return strtolower($doc->category) === 'proposal';
    });

    $skripsi = $documents->filter(function ($doc) {
        return strtolower($doc->category) === 'skripsi';
    });

    // Kirim data ke view
    return view('index', compact('categories', 'kp', 'proposals', 'skripsi', 'documents', 'years'));
}



    
public function detail($id)
{
    $document = Documents::findOrFail($id);

    $relatedDocuments = Documents::where('category', $document->category)
        ->where('id', '!=', $id)
        ->limit(4)
        ->get();

    return view('detail', compact('document', 'relatedDocuments'));
}




public function kp(Request $request)
{
    // Ambil documents kategori "kp"
    $query = Documents::where('category', 'kp');

    // Ambil parameter search dan year
    $search = $request->input('search');
    $year = $request->input('year');
    
    // Filter berdasarkan tahun jika ada
    if ($year) {
        $query->where('year', $year);
    }

    // Filter berdasarkan pencarian jika ada (gunakan ILIKE untuk case-insensitive search)
    if ($search) {
        $query->where('title', 'ILIKE', '%' . $search . '%');
    }

    // Ambil data dokumen sesuai query
    $kp = $query->get();

    // Ambil daftar tahun unik
    $years = Documents::where('category', 'kp')
        ->select('year')
        ->distinct()
        ->orderBy('year', 'desc')
        ->pluck('year');

    // Kirim data ke view
    return view('pages.category.kp', compact('kp', 'years', 'year', 'search'));
}




public function proposal(Request $request)
{
    // Ambil data proposal berdasarkan kategori
    $query = Documents::where('category', 'proposal');
    
    // Ambil parameter pencarian dan tahun
    $search = $request->input('search');
    $year = $request->input('year');
    
    // Cek jika ada tahun yang dipilih, maka filter berdasarkan tahun
    if ($year) {
        $query->where('year', $year);
    }

    // Cek jika ada pencarian, maka filter berdasarkan judul
    if ($search) {
        $query->where('title', 'ILIKE', '%' . $search . '%');
    }

    // Ambil data proposal yang sudah difilter
    $proposal = $query->get();

    // Ambil daftar tahun unik untuk filter
    $years = Documents::where('category', 'proposal')
        ->select('year')
        ->distinct()
        ->orderBy('year', 'desc')
        ->pluck('year');

    // Kembalikan ke view dengan data yang sudah diproses
    return view('pages.category.proposal', compact('proposal', 'years', 'year', 'search'));
}



        public function skripsi(Request $request)
        {
        // ambil data proposal
        $query = Documents::where('category', 'skripsi');

        // search
        $search =$request->input('search');

        // tahun
        $year =$request->input('year');

        if($year){
            $query->where('year', $year);
        }
            
        // filter
        if ($search) {
            $query->where('title', 'ILIKE', '%' . $search . '%');
        }
        $skripsi = $query->get();
        $years = Documents::where('category', 'skripsi') // Ambil daftar tahun unik
        ->select('year')
        ->distinct()
        ->orderBy('year', 'desc')
        ->pluck('year'); //    
        return view('pages.category.skripsi', compact('skripsi', 'years', 'year'));
        }

        public function dashboard()
        {
            // Menghitung jumlah pengguna
            $userCount = User::count();
    
            // Menghitung jumlah Skripsi, Proposal, dan Kerja Praktek berdasarkan kategori
            $skripsiCount = Documents::where('category', 'skripsi')->count();
            $proposalCount = Documents::where('category', 'proposal')->count();
            $kpCount = Documents::where('category', 'kp')->count();
    
            // Menghitung jumlah yang selesai (completed) untuk masing-masing kategori
            $skripsiCompleted = Documents::where('category', 'skripsi')->where('status', 'completed')->count();
            $proposalCompleted = Documents::where('category', 'proposal')->where('status', 'completed')->count();
            $kpCompleted = Documents::where('category', 'kp')->where('status', 'completed')->count();
    
            // Data untuk menampilkan ke view
            $cards = [
                [
                  'title' => 'Users',
                    'count' => $userCount,
                    'completed' => $skripsiCompleted,
                    'icon' => '<svg width="29" height="21" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.4899 14.1139C18.7832 14.1139 22.4492 14.7946 22.4492 17.5183C22.4492 20.2409 18.8068 20.9464 14.4899 20.9464C10.1965 20.9464 6.53054 20.2657 6.53054 17.5431C6.53054 14.8194 10.173 14.1139 14.4899 14.1139ZM21.3545 12.4738C22.9958 12.4434 24.7605 12.6688 25.4126 12.8288C26.794 13.1004 27.7027 13.6548 28.0791 14.4605C28.3973 15.122 28.3973 15.8895 28.0791 16.5498C27.5032 17.7996 25.6467 18.2008 24.9252 18.3044C24.7762 18.327 24.6563 18.1974 24.672 18.0475C25.0406 14.5845 22.1085 12.9426 21.35 12.5651C21.3175 12.5482 21.3108 12.5223 21.3141 12.5065C21.3164 12.4952 21.3298 12.4772 21.3545 12.4738ZM7.4446 12.4715L7.75368 12.4743C7.77833 12.4776 7.79066 12.4957 7.7929 12.5058C7.79626 12.5227 7.78954 12.5475 7.75817 12.5655C6.99853 12.943 4.06644 14.585 4.43506 18.0468C4.45074 18.1978 4.33198 18.3263 4.18297 18.3049C3.46143 18.2012 1.60492 17.8 1.02904 16.5503C0.709722 15.8888 0.709722 15.1225 1.02904 14.461C1.40549 13.6553 2.31302 13.1008 3.69447 12.8281C4.34766 12.6692 6.11118 12.4438 7.75368 12.4743L7.4446 12.4715ZM14.4899 0.925873C17.413 0.925873 19.7569 3.28112 19.7569 6.22236C19.7569 9.16248 17.413 11.52 14.4899 11.52C11.5667 11.52 9.22287 9.16248 9.22287 6.22236C9.22287 3.28112 11.5667 0.925873 14.4899 0.925873ZM21.6402 1.80915C24.4636 1.80915 26.6808 4.48106 25.9257 7.45723C25.4159 9.46089 23.5706 10.7918 21.5147 10.7377C21.3085 10.732 21.1057 10.7129 20.9097 10.6791C20.7674 10.6543 20.6957 10.4931 20.7763 10.3737C21.5606 9.21296 22.0077 7.81672 22.0077 6.31793C22.0077 4.75377 21.5192 3.29555 20.671 2.09989C20.6441 2.0627 20.624 2.00523 20.6508 1.96241C20.6733 1.92747 20.7147 1.90944 20.7539 1.90043C21.0396 1.84183 21.3332 1.80915 21.6402 1.80915ZM7.4663 1.80903C7.77329 1.80903 8.06684 1.84171 8.35366 1.90031C8.39175 1.90933 8.43433 1.92849 8.45674 1.96229C8.48251 2.00512 8.46346 2.06259 8.43657 2.09978C7.58842 3.29543 7.09993 4.75366 7.09993 6.31781C7.09993 7.81661 7.54697 9.21285 8.33125 10.3736C8.41192 10.493 8.34021 10.6542 8.19792 10.679C8.00073 10.7139 7.79906 10.7319 7.59291 10.7376C5.53697 10.7917 3.69167 9.46077 3.18189 7.45712C2.42562 4.48095 4.64289 1.80903 7.4663 1.80903Z" fill="#EFF2F4"/></svg>',
                    'iconColor' => 'text-white',
                    'bgColor' => 'bg-blue-500',
                ],
                [
                    'title' => 'Skripsi',
                    'count' => $skripsiCount,
                    'completed' => $skripsiCompleted,
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 1920">
                        <style>
                            .st0{fill:#fff;} /* Mengatur warna fill menjadi putih */
                            .st1{fill:none;stroke:#ffffff;stroke-width:50;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} /* Mengubah warna stroke menjadi putih */
                        </style>
                        <path class="st0" d="M959.3 627.2L215.6 892.5l376 101.6v168.1c0 56.5 164.6 102.3 367.7 102.3s367.7-45.8 367.7-102.3V994.1l136.4-36.9 239.7-64.8-743.8-265.2z" id="Layer_11"/>
                        <path class="st0" d="M1520.7 1240.5c0-26.2-25.7-47.5-57.3-47.5-31.6 0-57.3 21.3-57.3 47.5s25.7 47.5 57.3 47.5c31.6 0 57.3-21.3 57.3-47.5zm8 114.2c0-63.7-57.3-66.7-57.3-66.7h-8s-14.3.8-28.7 9.5c-14.3 8.7-28.6 25.4-28.6 57.2 0 63.7 35.8 158.6 0 193.9 0 0 31.1 2.2 61.3-22 30.2 24.3 61.3 22 61.3 22-35.7-35.3 0-130.2 0-193.9z" id="Layer_13"/>
                        <g id="STROKES">
                            <path class="st1" d="M1327 994.1v-65.9c0-56.5-164.6-102.3-367.7-102.3-203 0-367.7 45.8-367.7 102.3v65.9l-376-101.6 743.7-265.3L1703 892.5l-376 101.6z"/>
                            <path class="st1" d="M1327 928.1v234c0-46.1-109.4-85-259.9-97.9l-107.8 29.1-107.8-29.1C701 1077 591.6 1116 591.6 1162.1v-234c0-56.5 164.6-102.3 367.7-102.3S1327 871.6 1327 928.1z"/>
                            <path class="st1" d="M1327 1162.1c0 56.5-164.6 102.3-367.7 102.3-203 0-367.7-45.8-367.7-102.3 0-46.1 109.4-85 259.9-97.9l107.8 29.1 107.8-29.1c150.5 12.9 259.9 51.9 259.9 97.9z"/>
                            <ellipse class="st1" cx="1463.4" cy="1240.5" rx="57.3" ry="47.5"/>
                            <path class="st1" d="M1528.7 1354.7c0-63.7-57.3-66.7-57.3-66.7h-8s-57.3 3-57.3 66.7 35.8 158.6 0 193.9c0 0 31.1 2.3 61.3-22 30.2 24.3 61.3 22 61.3 22-35.7-35.3 0-130.2 0-193.9z"/>
                            <path class="st1" d="M1463.4 1193V957.2"/>
                        </g>
                    </svg>
                    ',
                    'iconColor' => 'text-white',
                    'bgColor' => 'bg-blue-500',
                ],
                [
                    'title' => 'Proposal',
                    'count' => $proposalCount,
                    'completed' => $proposalCompleted,
                    'icon' => '<svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.3914 3.06704C23.1914 2.95454 24.9664 3.57953 26.3039 4.80452C27.5289 6.14201 28.1539 7.91699 28.0539 9.72948V21.4044C28.1664 23.2169 27.5289 24.9918 26.3164 26.3293C24.9789 27.5543 23.1914 28.1793 21.3914 28.0668H9.71644C7.90394 28.1793 6.12895 27.5543 4.79145 26.3293C3.56645 24.9918 2.94145 23.2169 3.05395 21.4044V9.72948C2.94145 7.91699 3.56645 6.14201 4.79145 4.80452C6.12895 3.57953 7.90394 2.95454 9.71644 3.06704H21.3914ZM21.0664 8.77948C20.2914 8.00449 19.0414 8.00449 18.2664 8.77948L17.4289 9.62948C17.3039 9.75448 17.3039 9.96697 17.4289 10.092C17.4289 10.092 17.4535 10.1164 17.4971 10.1598L17.8046 10.4656C17.9825 10.6425 18.2045 10.8635 18.4274 11.0857L19.1833 11.8412C19.341 11.9997 19.4456 12.1058 19.4539 12.117C19.5914 12.267 19.6789 12.467 19.6789 12.6919C19.6789 13.1419 19.3164 13.5169 18.8539 13.5169C18.6414 13.5169 18.4414 13.4294 18.3039 13.2919L16.2164 11.217C16.1164 11.117 15.9414 11.117 15.8414 11.217L9.87894 17.1794C9.46644 17.5919 9.22894 18.1419 9.21644 18.7294L9.14144 21.6919C9.14144 21.8544 9.19144 22.0044 9.30394 22.1169C9.41644 22.2294 9.56644 22.2919 9.72894 22.2919H12.6664C13.2664 22.2919 13.8414 22.0544 14.2789 21.6294L22.6914 13.1919C23.4539 12.417 23.4539 11.167 22.6914 10.4045L21.0664 8.77948Z" fill="white"/>
                    </svg>
                    ',
                    'iconColor' => 'text-white',
                    'bgColor' => 'bg-green-500',
                ],
                [
                    'title' => 'Kerja Praktek',
                    'count' => $kpCount, // Menghitung persentase atau jumlah
                    'completed' => $kpCompleted . '%', // Persentase completed
                    'icon' => '<svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.7979 0.177177C20.6631 0.177177 22.8153 2.40446 22.8153 6.22087V19.1466C22.8153 23.0256 20.6631 25.2028 16.7979 25.2028H6.3109C2.50701 25.2028 0.292236 23.0256 0.292236 19.1466V6.22087C0.292236 2.40446 2.50701 0.177177 6.3109 0.177177H16.7979ZM6.64875 17.3698C6.27336 17.3323 5.91049 17.5074 5.71029 17.8328C5.51008 18.1456 5.51008 18.5585 5.71029 18.8838C5.91049 19.1967 6.27336 19.3844 6.64875 19.3343H16.4588C16.9581 19.2843 17.3347 18.8576 17.3347 18.3583C17.3347 17.8453 16.9581 17.4198 16.4588 17.3698H6.64875ZM16.4588 11.6627H6.64875C6.10945 11.6627 5.67275 12.1019 5.67275 12.6399C5.67275 13.178 6.10945 13.6159 6.64875 13.6159H16.4588C16.9969 13.6159 17.4348 13.178 17.4348 12.6399C17.4348 12.1019 16.9969 11.6627 16.4588 11.6627ZM10.3888 5.99564H6.64875V6.00815C6.10945 6.00815 5.67275 6.4461 5.67275 6.98415C5.67275 7.5222 6.10945 7.96015 6.64875 7.96015H10.3888C10.9281 7.96015 11.3661 7.5222 11.3661 6.97039C11.3661 6.43359 10.9281 5.99564 10.3888 5.99564Z" fill="#EFF2F4"/>
                    </svg>
                    ',
                    'iconColor' => 'text-white',
                    'bgColor' => 'bg-red-500',
                ],
            ];
            
    
            return view('dashboard', compact('cards'));
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

    // Pastikan hanya admin yang dapat mengakses halaman ini
    if (!Auth::user() || !Auth::user()->is_admin) {
        abort(403, 'Unauthorized'); // Jika bukan admin, kembalikan 403 Forbidden
    }

    // Ambil semua pengguna yang bukan admin
    $users = \App\Models\User::where('roles', '!=', 'admin')->get();

    // Kirim variabel category dan users ke view
    return view("pages.dashboard.documents.$category.create", compact('category', 'users'));
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
            'status' => 'required|string|in:pending,approved,rejected', // Validasi nilai status
            'user_id' => 'nullable|exists:users,id', // Validasi user_id jika diberikan
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB limit untuk gambar
            'nim' => 'nullable|string|max:20',
            'description' => 'required|string',
            'bab2' => 'nullable|file|mimes:pdf|max:51200', // Bab 2 opsional
            'bab3' => 'nullable|file|mimes:pdf|max:51200', // Bab 3 opsional
            'bab4' => 'nullable|file|mimes:pdf|max:51200', // Bab 4 opsional
            
        ]);
    
        // Simpan file di folder 'documents' di disk 'public'
        $filePath = $request->file('file')->store('documents', 'public');

          // Simpan cover jika diberikan
          $coverPath = $request->hasFile('cover')
          ? $request->file('cover')->store('covers', 'public')
          : null;

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

    
        // Tentukan user_id, jika admin dan user_id disediakan gunakan itu, jika tidak gunakan Auth::id()
        $userId = Auth::user()->is_admin && $request->user_id 
                  ? $request->user_id 
                  : Auth::id();

                
    
        // Simpan data ke database
        Documents::create([
            'title' => $request->title,
            'category' => $request->category,
            'file_path' => $filePath,
            'status' => $request->status, // Default status
            'submission_date' => now(),
            'review_date' => now(),
            'user_id' => $userId,
            'year' => $request->year ?? now()->year, // Default ke tahun sekarang jika tidak diisi
            'cover' => $coverPath, // Simpan path cover jika ada
            'nim' => $request->nim,
            'description' => $request->description,
            'bab2' => $bab2Path, // Simpan path Bab 2 jika ada
            'bab3' => $bab3Path, // Simpan path Bab 3 jika ada
            'bab4' => $bab4Path, // Simpan path Bab 4 jika ada


        ]);
    
        return redirect()->route('dashboard.documents.index')->with('success', 'Document created successfully.');
    }
    
    

    /**
     * Display the specified document.
     */
    public function show(Documents $document)
    {
        return view('pages.dashboard.documents.status', compact('document'));
    }

    /**
     * Show the form for editing the specified document.
     */
    public function edit(Documents $document)
    {
        return view('pages.dashboard.documents.edit', compact('document'));
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, Documents $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|in:pending,approved,rejected', // Validasi status
            'description' => 'required|string',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'nim' => 'nullable|string|max:20',
            'bab2' => 'nullable|file|mimes:pdf|max:51200', // Bab 2 opsional
            'bab3' => 'nullable|file|mimes:pdf|max:51200', // Bab 3 opsional
            'bab4' => 'nullable|file|mimes:pdf|max:51200', // Bab 4 
            
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
        

        $document->update([
            'title' => $request->title,
            'category' => $request->category,
            'status' => $request->status,
            'review_date' => now(), // Tambahkan tanggal review ketika status diperbarui
            'description' => $request->description,
            'year' => $request->year ?? now()->year, // Default ke tahun sekarang jika tidak diisi
            'nim' => $request->nim,
            'file_path' => $filePath,
            'cover' => $coverPath,
            'bab2' => $bab2Path,
            'bab3' => $bab3Path,
            'bab4' => $bab4Path,



        ]);

        return redirect()->route('dashboard.documents.index')->with('success', 'Document updated successfully.');
    }

        public function updateStatus(Request $request, Documents $document)
        {
            $request->validate([
                'status' => 'required|in:pending,approved,rejected',
            ]);

            $document->status = $request->status;

            // Jika status rejected, tambahkan alasan penolakan
            // if ($request->status == 'rejected') {
            //     $document->rejection_reason = $request->input('rejection_reason', 'No reason provided');
            // } else {
            //     $document->rejection_reason = null;
            // }

            $document->save();

            return redirect()->route('dashboard.documents.index', $document)->with('success', 'Status updated successfully.');
    }


    /**
     * Remove the specified document from storage.
     */
    public function destroy(Documents $document)
    {
        $document->delete();

        return redirect()->route('dashboard.documents.index')->with('success', 'Document deleted successfully.');
    }
}
