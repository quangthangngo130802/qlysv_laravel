<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassroomAdminController extends Controller
{
    public function formClassroom()
    {
        $classroom = Classroom::orderBy('classroom_id', 'DESC')
            ->paginate(10);
        return view('Admin.Classroom.listClassroom', compact('classroom'));
    }

    public function formAddClassroom()
    {
        return view('Admin.Classroom.addClassroom');
    }

    public function addClassroom(Request $request)
    {
        $request->validate([
            'building_name' => 'required',
            'room_name' => 'required',
            'capacity' => 'integer|min:1'
        ]);
        $classroom = Classroom::create([
            'building_name' => $request->building_name,
            'room_name' => $request->room_name,
            'capacity' => $request->capacity
        ]);
        if ($classroom !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdateClassroom($classroom_id)
    {
        $classroom = Classroom::where('classroom_id', $classroom_id)->first();
        return view('Admin.Classroom.updateClassroom', compact('classroom'));
    }

    public function updateClassroom(Request $request, $classroom_id)
    {
        $classroom = Classroom::where('classroom_id', $classroom_id)->first();
        $request->validate([
            'building_name' => [
                'required',
                Rule::unique('tbl_classroom')->where(function ($query) use ($request) {
                    return $query->where('room_name', $request->room_name);
                })->ignore($classroom->classroom_id, 'classroom_id'), // Ignore the current classroom record while checking uniqueness
            ],
            'room_name' => [
                'required',
                Rule::unique('tbl_classroom')->where(function ($query) use ($request) {
                    return $query->where('building_name', $request->building_name);
                })->ignore($classroom->classroom_id, 'classroom_id'), // Ignore the current classroom record while checking uniqueness
            ],
            'capacity' => 'integer|min:1'
        ]);

        $classroom = Classroom::where('classroom_id', $classroom_id)->update([
            'building_name' => $request->building_name,
            'room_name' => $request->room_name,
            'capacity' => $request->capacity
        ]);
        if ($classroom !== null) {
            return redirect()->route('admin.classroom.form')->with('success', 'Data has been processed successfully.');
        }
        return redirect()->route('admin.classroom.form')->with('error', 'Data processing failed. Please try again.');
    }

    public function deleteClassroom(Request $request){
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $classroom = Classroom::whereIn('classroom_id', $selectedItems)->delete();
            if ($classroom) {
                return response()->json(['success' => 'Classroom deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete classroom'], 500);
            }
        }
    }
}
