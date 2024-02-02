<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class BlogController extends Controller
{
    public function index():View{
        //$posts= Post::paginate(25);
        return view('blog.index');
    }
    public function show(string $slug,string $id):RedirectResponse|Post{
        $post=Post::findOrFail($id);
        if($post->slug != $slug){
            return to_route('blog.show',['slug'=>$post->slug,'id'=>$post->id]);
        }
        return $post;
    }
}
