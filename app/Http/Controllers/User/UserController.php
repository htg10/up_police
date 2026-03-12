<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dak_History;
use Illuminate\Http\Request;
use App\Models\Dak;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $daks = Dak::latest()->paginate(10)->where('user_id', Auth::id());
        $users = User::all();
        return view('user.daks.index', compact('daks', 'users'));
    }

    public function create()
    {
        return view('user.daks.create');
    }

    // public function updateUser(Request $request, Dak $dak)
    // {
    //     $dak->user_id = $request->user_id;
    //     $dak->save();
    //     return back()->with('success', 'User assigned successfully.');
    // }

    public function updateUser(Request $request, Dak $dak)
    {

        $dak->user_id = $request->user_id;
        $dak->save();

        Dak_History::create([

            'dak_id' => $dak->id,
            'assigned_by' => auth()->id(),
            'assigned_to' => $request->user_id,
            'remark' => $request->remark,
            'pickup_date' => $request->pickup_date

        ]);

        return back()->with('success', 'User assigned successfully.');
    }

    public function updateStatus(Request $request, Dak $dak)
    {
        $dak->status = $request->status;
        $dak->save();
        return back()->with('success', 'Status updated successfully.');
    }

    public function updateRemark(Request $request, Dak $dak)
    {
        $dak->remark = $request->remark;
        $dak->save();
        return back()->with('success', 'Remark updated successfully.');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('daks', $filename, 'public');
            $data['attachment'] = $filename;
        }

        Dak::create($data);

        return redirect()
            ->route('user.daks')
            ->with('success', 'रिकॉर्ड सफलतापूर्वक जोड़ा गया');
    }

    public function edit(Dak $dak)
    {
        return view('user.daks.edit', compact('dak'));
    }

    public function update(Request $request, Dak $dak)
    {
        $data = $request->all();

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('daks', $filename, 'public');
            $data['attachment'] = $filename;
        }

        $dak->update($data);

        return redirect()
            ->route('user.daks')
            ->with('success', 'रिकॉर्ड अपडेट किया गया');
    }

    public function destroy(Dak $dak)
    {
        $dak->delete();

        return redirect()
            ->route('user.daks')
            ->with('success', 'रिकॉर्ड सुरक्षित रूप से हटाया गया');
    }

    public function restore($id)
    {
        // $dak = Dak::onlyTrashed()->findOrFail($id);
        $dak = Dak::withTrashed()->findOrFail($id);

        $dak->restore();

        return redirect()
            ->route('user.daks')
            ->with('success', 'रिकॉर्ड पुनः स्थापित किया गया');
    }

    public function downloadDocuments($id)
    {
        $dak = Dak::findOrFail($id);

        if (!$dak->attachment) {
            return back()->with('error', 'No document found.');
        }

        $filePath = public_path('storage/daks/' . $dak->attachment);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File not found.');
        }

        $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', 'dak-file');
        $date = $dak->created_at->format('Y-m-d');

        $fileName = $safeName . '_' . $date . '.' . pathinfo($filePath, PATHINFO_EXTENSION);

        return response()->download($filePath, $fileName);
    }
}
