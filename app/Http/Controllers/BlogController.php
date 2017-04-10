<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Http\Requests;
use Carbon\Carbon;

class BlogController extends Controller
{
    protected $limit=3;
	
	public function index(){
		/*
			MODO DEBUG
		
		\DB::enableQueryLog();
		$posts = Post::with('author')->get();
		view('index', compact('posts'))->render();
		dd( \DB::getQueryLog() );
		*/
		$categories = Category::with(['posts'=> function($query){
			$query->where("published_at", "<=", Carbon::now());
		}])->orderBy('title', 'asc')->get();
		
		//dois tipos de paginacao - simplePaginate e paginate
		$posts = Post::with('author')->orderBy('created_at', 'desc')->published()->simplePaginate($this->limit);
		return view('index', compact('posts', 'categories'));
	}
	
	public function category($id){
		/*
			MODO DEBUG
		
		\DB::enableQueryLog();
		$posts = Post::with('author')->get();
		view('index', compact('posts'))->render();
		dd( \DB::getQueryLog() );
		*/
		$categories = Category::with(['posts'=> function($query){
			$query->where("published_at", "<=", Carbon::now());
		}])->orderBy('title', 'asc')->get();
		
		//dois tipos de paginacao - simplePaginate e paginate
		$posts = Post::with('author')
			->orderBy('created_at', 'desc')
			->published()
			->where('category_id', $id)
			->simplePaginate($this->limit);
		return view('index', compact('posts', 'categories'));
	}
	
	public function show($id){
		$post = Post::findOrFail($id);
		return view('blog.show', compact('post'));
	}
}
