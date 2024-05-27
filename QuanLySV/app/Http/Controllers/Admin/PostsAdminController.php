<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsAdminController extends Controller
{
    public function formPosts()
    {
        $posts = Posts::join('tbl_admin', 'tbl_admin.admin_id', '=', 'tbl_posts.admin_id')
            ->orderBy('posts_id', 'DESC')
            ->paginate(5);
        return view('Admin.Posts.listPosts', compact('posts'));
    }

    public function formAddPosts()
    {
        return view('Admin.Posts.addPosts');
    }

    public function addPosts(Request $request)
    {
        $request->validate([
            'posts_title' => 'required',
            'posts_content' => 'required'
        ]);
        $posts = Posts::create([
            'posts_title' => $request->posts_title,
            'posts_content' => $request->posts_content,
            'admin_id' => Auth::guard('admin')->user()->admin_id,
            'created_at' => now()
        ]);
        if ($posts !== null) {
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        }
        return redirect()->back()->with('error', 'Data processing failed. Please try again.');
    }

    public function formUpdatePosts($posts_id)
    {
        $posts = Posts::where('posts_id', $posts_id)->first();
        return view('Admin.Posts.updatePosts', compact('posts'));
    }

    public function updatePosts(Request $request, $posts_id)
    {
        $request->validate([
            'posts_title' => 'required',
            'posts_content' => 'required',

        ]);
        $posts = Posts::where('posts_id', $posts_id)->update([
            'posts_title' => $request->posts_title,
            'posts_content' => $request->posts_content,
            'updated_at' => now()
        ]);
        if ($posts !== null) {
            return redirect()->route('admin.posts.form')->with('success', 'Data has been processed successfully.');
        }
        return redirect()->route('admin.posts.form')->with('error', 'Data processing failed. Please try again.');
    }

    public function deletePosts(Request $request){
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $deletePosts = Posts::whereIn('posts_id', $selectedItems)->delete();
            if ($deletePosts) {
                return response()->json(['success' => 'Student deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete students'], 500);
            }
        }
    }

    public function searchPosts(Request $request)
    {
        $keyword = $request->keyword;
        $posts = Posts::Where('posts_title', 'like', '%' . $request->keyword . '%')
            ->paginate(10);
        if ($posts->isNotEmpty()) {
            return view('Admin.Posts.searchPosts', compact('posts', 'keyword'));
        }
        $error = 'No matching data found';
        return view('Admin.Posts.searchPosts', compact('error', 'keyword'));
    }
}
