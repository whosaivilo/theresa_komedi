<?php
namespace App\Http\Controllers;

use App\Models\MultipleUpload;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['gender'];

        $searchableColumns = ['first_name', 'last_name', 'email'];

        $data['dataPelanggan'] = Pelanggan::filter($request, $filterableColumns)->search($request, $searchableColumns)
            ->paginate(10)->onEachSide(1)->withQueryString();
        return view('admin.pelanggan.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'birthday'   => 'nullable|date',
            'gender'     => 'nullable|in:male,female',
            'email'      => 'required|email|unique:pelanggans,email',
            'phone'      => 'nullable|string|max:20',
            'files.*'    => 'nullable|file|max:2048', // 2MB per file
        ]);
        // Simpan Data Pelanggan
        $pelanggan = Pelanggan::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'] ?? null,
            'birthday'   => $validated['birthday'] ?? null,
            'gender'     => $validated['gender'] ?? null,
            'email'      => $validated['email'],
            'phone'      => $validated['phone'] ?? null,
        ]);

        // Upload Multiple File jika ada
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $filename, 'public');

                MultipleUpload::create([
                    'file'      => $filename,
                    'ref_table' => 'pelanggan',
                    'ref_id'    => $pelanggan->pelanggan_id,
                ]);
            }
        }

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::where('pelanggan_id', $id)->firstOrFail();

        $files = MultipleUpload::where('ref_table', 'pelanggan')
            ->where('ref_id', $id)
            ->get();

        return view('admin.pelanggan.show', compact('pelanggan', 'files'));
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function uploadFile(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $filename, 'public');

                MultipleUpload::create([
                    'file'      => $filename,
                    'ref_table' => $request->ref_table,
                    'ref_id'    => $request->ref_id,
                ]);
            }
        }

        return back()->with('success', 'File berhasil diupload');
    }
    public function deleteFile($id)
    {
        $file = MultipleUpload::findOrFail($id);

        Storage::disk('public')->delete('uploads/' . $file->file);
        $file->delete();

        return back()->with('success', 'File berhasil dihapus');
    }

}
