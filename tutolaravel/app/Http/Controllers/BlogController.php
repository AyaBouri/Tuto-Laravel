<?php
namespace App\Http\Controllers;
use App\Http\Requests\BlogFilterRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
class BlogController extends Controller
{
    public function index(BlogFilterRequest $request):View{
        //dd($request->validated());
        $post=new Post();
        return view('blog.index',[
            $currentPage = $post->currentPage(),
            $totalPages = $post->lastPage()
        ]);
    }
    public function show(Post $post,string $slug):RedirectResponse|View{
       // dd($request->route()->parameter('post'));
        //$post=Post::findOrFail($post);
        if($post->slug != $slug){
            return to_route('blog.show',['slug'=>$post->slug,'id'=>$post->id]);
        }
        return view('blog.show',[
            'post'=>$post
        ]);
    }
}
