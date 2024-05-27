<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectAdminController extends Controller
{
    public function formSubject()
    {
        $subjects = Subject::with('major')
            ->orderBy('subject_id', 'DESC')
            ->paginate(10);
        return view('Admin.Subject.listSubject', compact('subjects'));
    }

    public function formAddSubject()
    {
        $major = Major::orderBy('major_name')->get();
        return view('Admin.Subject.addSubject', compact('major'));
    }

    public function addSubject(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|unique:tbl_subject,subject_code',
            'subject_name' => 'required|unique:tbl_subject,subject_name',
            'subject_credit' => 'required|integer|min:1',
            'major_id' => 'required'
        ]);
        $subject = Subject::create([
            'subject_code' => $request->subject_code,
            'subject_name' => $request->subject_name,
            'subject_credit' => $request->subject_credit,
            'major_id' => $request->major_id
        ]);
        if ($subject !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdateSubject($subject_id)
    {
        $major = Major::orderBy('major_name')->get();
        $subject = Subject::where('subject_id', $subject_id)->first();
        return view('Admin.Subject.updateSubject', compact('major', 'subject'));
    }

    public function updateSubject(Request $request, $subject_id)
    {
        $subject = Subject::where('subject_id', $subject_id)->first();
        $request->validate([
            'subject_code' => [
                'required',
                Rule::unique('tbl_subject')->ignore($subject->subject_code, 'subject_code')
            ],
            'major_id' => 'required',
            'subject_name' => [
                'required',
                Rule::unique('tbl_subject')->ignore($subject->subject_name, 'subject_name')
            ],
            'subject_credit' => 'required|integer|min:1'
        ]);

        $subject = Subject::where('subject_id', $subject_id)->update([
            'subject_code' => $request->subject_code,
            'subject_name' => $request->subject_name,
            'subject_credit' => $request->subject_credit,
            'major_id' => $request->major_id
        ]);
        if ($subject !== null) {
            return redirect()->route('admin.subject.form')->with('success', 'Data has been processed successfully.');
        }
        return redirect()->route('admin.subject.form')->with('error', 'Data processing failed. Please try again.');
    }

    public function deleteSubject(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $subject = Subject::whereIn('subject_id', $selectedItems)->delete();
            if ($subject) {
                return response()->json(['success' => 'Classroom deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete classroom'], 500);
            }
        }
    }

    public function searchSubject(Request $request)
    {
        $keyword = $request->keyword;
        $searchBy = $request->searchBy;
        $query = Subject::query();
        if ($searchBy == '1') {
            $query->where('subject_code', $keyword);
        } elseif ($searchBy == '2') {
            $query->Where('subject_name', 'like', '%' . $keyword . '%');
        }
        $subjects = $query->paginate(10);
        if ($subjects->isEmpty()) {
            $error = 'No matching data found';
            return view('Admin.Subject.searchSubject', compact('searchBy', 'keyword', 'error'));
        }
        return view('Admin.Subject.searchSubject', compact('subjects', 'keyword', 'searchBy'));

    }
}
