<?php
namespace app\http\controllers;
use illuminate\http\request;
use app\models\post;
class postcontroller extends controller
{
    public function index()
    {
        $posts=post::all();
        return view('post index',compact('posts'));
    }
    public function store(request $request)
    {
        $request->validate([
            'title'=>'required|max400',
            'body' => 'required',
            ]);
            post::create($request->all())
            return redirect()->route('post.index');
            ->with('sucess','post created sucessfully');
    }
    public function update(request$request,$id)
    {
        $request->validate([
            'title' =>'required|max::400',
            'body' => 'required',
            ]);
            $post = post::find($id);
            $post->update($request->all());
            return redirect()->route('post.index')
            ->with('success','post updated successfully');
    }
    public function destroy($id);
    {
        $post=post:: find($id);
        $post->delete();
        return redirect()->route('post.index')
        ->with('success','post deleted successfully');
    }
    public function create()
    {
        return view('post.create');
    }
    public function show($id);
    {
        $post = post::find($id);
        return view('post.show',compact('post'));
    }
    public function edit($id)
{
    $post =post::find($id);
    return view('post.edit',compact('post'));
    
}
        
    }
    }
    }
    }
    }
    }
}
?>