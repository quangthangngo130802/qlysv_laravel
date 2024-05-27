<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function form()
    {
        $data = Term::orderBy('term_id', 'DESC')->paginate(10);
        return view('Admin.Term.list', compact('data'));
    }

    public function formAdd()
    {
        return view('Admin.Term.add');
    }

    public function add(Request $request)
    {
        if ($request->on_off == null) {
            $on = 0;
        } else {
            $on = 1;
            Term::query()->update(['on_off' => '0']);
        }
        $data = $request->all();
        $create = Term::create([  // nếu create thât bại sẽ trả về giá trị null
            'name' => $request->name,
            'on_off' => $on
        ]);

        if ($create !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)

            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdate($id)
    {
        $data = Term::where('term_id', $id)->first();
        return view('Admin.Term.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->on_off == null) {
            $on = 0;
        } else {
            Term::query()->update(['on_off' => '0']);
            $on = 1;
        }
        $update = Term::where('term_id', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            'name' => $request->name,
            'on_off' => $on
        ]);
        if ($update !== null) {
            return redirect()->route('admin.term.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $major = Term::whereIn('term_id', $selectedItems)->delete();
            if ($major) {
                return response()->json(['success' => 'Term deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete teachers'], 500);
            }
        }
    }
}
