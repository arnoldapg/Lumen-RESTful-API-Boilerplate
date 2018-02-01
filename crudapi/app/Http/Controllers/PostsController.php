<?php
namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller{
	/*to restrict unauthorized users*/
	function __construct(){
		$this->middleware('auth', ['only' => ['add', 'index']]);
	}

	/*list of post*/
	public function index(){
		$post = Post::all();

		return response()->json($post);
	}

	/*view specific post*/
	public function viewPost($id){
		$post = Post::find($id);

		return response()->json($post);
	}

	/*create a new post*/
	public function createPost(Request $request){
		$post = Post::create($request->all());

		return response()->json($post);
	}

	/*update a post*/
	public function updatePost(Request $request, $id){
		$post = Post::find($id);
		$post->title = $request->input('title');
		$post->body = $request->input('body');
		$post->views = $request->input('views');
		$post->save();

		return response()->json($post);
	}

	/*delete a post*/
	public function deletePost($id){
		$post = Post::find($id);
		$post->delete();

		return response()->json("Deleted successfully");
	}
}
?>