<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MajorAdminController extends Controller
{
    public function formMajor()
    {
        $majors = Major::join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_major.faculty_id')
            ->orderBy('major_id', 'DESC')->paginate(10);
        return view('Admin.Major.listMajor', compact('majors'));
    }

    public function formAddMajor()
    {
        $faculty = Faculty::get();
        return view('Admin.Major.addMajor', compact('faculty'));
    }

    public function addMajor(Request $request)
    {
        $request->validate([
            'major_code' => 'required|unique:tbl_major,major_code',
            'major_name' => 'required|unique:tbl_major,major_name',
            'faculty_id' => 'required'
        ]);
        $major = Major::create([
            'major_code' => $request->major_code,
            'major_name' => $request->major_name,
            'faculty_id' => $request->faculty_id
        ]);
        if ($major !== null) {
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        }
        return redirect()->back()->with('error', 'Data processing failed. Please try again.');
    }

    public function formUpdateMajor($major_id)
    {
        $major = Major::join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_major.faculty_id')
            ->where('major_id', $major_id)
            ->first();
        $faculty = Faculty::get();
        return view('Admin.Major.updateMajor', compact('major', 'faculty'));
    }

    public function updateMajor(Request $request, $major_id)
    {
        $major = Major::where('major_id', $major_id)->first();
        $request->validate([
            'major_code' => [
                'required',
                Rule::unique('tbl_major')
                    ->ignore($major->major_code, 'major_code')
            ],
            'major_name' => [
                'required',
                Rule::unique('tbl_major')
                    ->ignore($major->major_name, 'major_name')
            ],
            'faculty_id' => 'required'
        ]);

        $major = Major::where('major_id', $major_id)->update([
            'major_code' => $request->major_code,
            'major_name' => $request->major_name,
            'faculty_id' => $request->faculty_id
        ]);
        if ($major !== null) {
            return redirect()->route('admin.major.form')->with('success', 'Data has been processed successfully.');
        }
        return redirect()->route('admin.major.form')->with('error', 'Data processing failed. Please try again.');
    }

    public function deleteMajor(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $major = Major::whereIn('major_id', $selectedItems)->delete();
            if ($major) {
                return response()->json(['success' => 'Majors deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete teachers'], 500);
            }
        }
    }

    public function searchMajor(Request $request)
    {
        $searchBy = $request->searchBy;
        $keyword = $request->keyword;
        $query = Major::query();
        if ($searchBy == '1') {
            $query->where('major_code', $keyword);
        } elseif ($searchBy == '2') {
            $query->Where('major_name', 'like', '%' . $keyword . '%');
        }
        $majors = $query->paginate(10);
        if ($majors->isEmpty()) {
            $error = 'No matching data found';
            return view('Admin.Major.searchMajor', compact('searchBy', 'keyword', 'error'));
        }
        return view('Admin.Major.searchMajor', compact('majors', 'keyword', 'searchBy'));

    }
}
