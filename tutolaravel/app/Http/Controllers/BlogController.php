<?php
namespace App\Http\Controllers;
use App\Http\Requests\BlogFilterRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
class BlogController extends Controller
{
    public function create(){
        return view('blog.create');
    }
    public function store(Request $request){
        $post=Post::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'slug'=>Str::slug($request->input('title'))
        ]);
        //dd($request->all());
        return redirect()->route('blog.show',['slug'=>$post->slug,'post'=>$post->id]);
    }
    public function index(BlogFilterRequest $request):View{
        //dd($request->validated());
        return view('blog.index',[
            'posts' => Post::query()->paginate(1),
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
