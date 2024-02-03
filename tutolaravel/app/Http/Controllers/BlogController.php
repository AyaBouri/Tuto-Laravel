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
use App\Http\Requests\CreateRequest;
class BlogController extends Controller
{
    public function create(){
        //dd(session()->all());
        return view('blog.create');
    }

    /**
     * @return RedirectResponse
     */
    public function store(CreateRequest $request){
        $post=Post::create($request->validated());
        //dd($request->all());
        return redirect()->route('blog.show',['slug'=>$post->slug,'post'=>$post->id])->with('success','L article a bien été sauvegarder');
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
    public function edit(Post $post){
        return view('blog.edit',[
            'post'=>$post
        ]);
    }
    public function update(Post $post,CreatePostRequest $request){
        $post->update($request->validated());
        return redirect()->route('blog.show',['slug'=>$post->slug,'post'=>$post->id])->with('success','L article a bien été modifier');
    }
}
