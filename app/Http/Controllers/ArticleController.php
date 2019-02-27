<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Article;
use App\Image;
use App\Audio;
use App\Video;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$article = Article::latest()->paginate(5);
		return view('article.index', compact('article'))->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$article_id = Article::create($request->all())->id;
		
		
		if($request->hasFile('image'))
		{
			$request->validate([
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$imageName = time().'.'.$request->image->getClientOriginalExtension();
			$path = $request->image->storeAs('image', $imageName);
			$imageId = Image::create([
										'name' => $imageName
									])->id;
			$image = Image::find($imageId);
			$image->articles()->attach($article_id);
		}
		
		if($request->hasFile('audio'))
		{
			/*$request->validate([
				'audio' => 'required|audio|mimes:mp4|max:2048',
			]); */
			$audioName = time().'.'.$request->audio->getClientOriginalExtension();
			$path = $request->audio->storeAs('audio', $audioName);
			$audioId = Audio::create([
										'name' => $audioName
									])->id;
			$audio = Audio::find($audioId);
			$audio->articles()->attach($article_id);
		}
		
		if($request->has('video')){
			$videoId = Video::create([
										'videourl' => $request->video
									])->id;
			$video = Video::find($videoId);
			$video->articles()->attach($article_id);
		}
		
		return redirect()->route('article.index')
						->with('success', 'new article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$article = Article::find($id);
		return view('article.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$article = Article::find($id);
		return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$article = Article::find($id);
		$article->description = $request->get('description');
		$article->type = $request->get('type');
		$article->save();
		return redirect()->route('article.index')->with('success','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		
		$article = Article::find($id);
		$article->delete();
		return redirect()->route('article.index')
						->with('success', 'Article has been deleted successfully');
		
    }
	
	public function getArticleList()
	{
		$article = Article::with('videos', 'audios', 'images')->get();
		header("Access-Control-Allow-Origin: *");
		return Response::json(array('data' => $article));
	}
}
