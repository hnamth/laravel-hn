<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CVController extends Controller
{
    public function index(): View
    {
        return view('admin.cv.index', [
            'dataCV' => CV::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.cv.create');
    }

    public function store(Request $request): RedirectResponse
    {
        CV::create($this->validated($request));

        return redirect()->route('cv.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id): View
    {
        return view('admin.cv.edit', [
            'cv' => CV::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $cv = CV::findOrFail($id);
        $cv->update($this->validated($request, $cv));

        return redirect()->route('cv.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id): RedirectResponse
    {
        CV::findOrFail($id)->delete();

        return redirect()->route('cv.index')->with('success', 'Data Berhasil Dihapus!');
    }

    private function validated(Request $request, ?CV $cv = null): array
    {
        return $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => [
                'required', 'email', 'max:150',
                Rule::unique('cvs', 'email')->ignore($cv?->cv_id, 'cv_id'),
            ],
            'phone'      => ['nullable', 'string', 'max:20'],
        ]);
    }
}
