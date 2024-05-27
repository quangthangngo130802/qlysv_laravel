<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FacultyAdminController extends Controller
{
    public function formFaculty()
    {
        $facultys = Faculty::orderBy('faculty_id', 'DESC')->paginate(10);
        return view('Admin.Faculty.listFaculty', compact('facultys'));
    }

    public function formAddFaculty()
    {
        return view('Admin.Faculty.addFaculty');
    }

    public function addFaculty(Request $request)
    {
        $request->validate([
            'faculty_code' => 'required|unique:tbl_faculty,faculty_code',
            'faculty_name' => 'required|unique:tbl_faculty,faculty_name'
        ]);
        $faculty = Faculty::create([
            'faculty_code' => $request->faculty_code,
            'faculty_name' => $request->faculty_name
        ]);
        if ($faculty) {
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        }
        return redirect()->back()->with('error', 'Data processing failed. Please try again.');
    }

    public function formUpdateFaculty($faculty_id)
    {
        $faculty = Faculty::where('faculty_id', $faculty_id)->first();
        return view('Admin.Faculty.updateFaculty', compact('faculty'));
    }

    public function updateFaculty(Request $request, $faculty_id)
    {
        $faculty = Faculty::where('faculty_id', $faculty_id)->first();
        $request->validate([
            'faculty_code' => [
                'required',
                Rule::unique('tbl_faculty')
                    ->ignore($faculty->faculty_code, 'faculty_code')
            ],
            'faculty_name' => [
                'required',
                Rule::unique('tbl_faculty')
                    ->ignore($faculty->faculty_name, 'faculty_name')
            ]
        ]);

        $faculty = Faculty::where('faculty_id', $faculty_id)->update([
            'faculty_code' => $request->faculty_code,
            'faculty_name' => $request->faculty_name
        ]);
        if ($faculty !== null) {
            return redirect()->route('admin.faculty.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->route('admin.faculty.form')->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function deleteFaculty(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $faculty = Faculty::whereIn('faculty_id', $selectedItems)->delete();
            if ($faculty) {
                return response()->json(['success' => 'Faculty deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete teachers'], 500);
            }
        }
    }

    public function searchFaculty(Request $request)
    {
        $searchBy = $request->searchBy;
        $keyword = $request->keyword;
        $query = Faculty::query();
        if ($searchBy == '1') {
            $query->where('faculty_code', $keyword);
        } elseif ($searchBy == '2') {
            $query->Where('faculty_name', 'like', '%' . $keyword . '%');
        }
        $facultys = $query->paginate(10);
        if ($facultys->isEmpty()) {
            $error = 'No matching data found';
            return view('Admin.Faculty.searchFaculty', compact('searchBy', 'keyword', 'error'));
        }
        return view('Admin.Faculty.searchFaculty', compact('facultys', 'keyword', 'searchBy'));

    }
}
