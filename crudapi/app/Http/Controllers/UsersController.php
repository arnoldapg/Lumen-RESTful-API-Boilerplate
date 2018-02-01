<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller{
	/*list of user*/
	public function index(){
		$user = User::all();

		return response()->json($user);
	}

	/*view specific user*/
	public function view($id){
		$user = User::find($id);

		return response()->json($user);
	}

	/*create a new user*/
	public function add(Request $request){
		$request['api_token'] = str_random(60);
		$request['password'] = app('hash')->make($request['password']); //same as bcrypt hash
		$user = User::create($request->all());

		return response()->json($user);
	}

	/*update a user*/
	public function edit(Request $request, $id){
		$user = User::find($id);
		$user->update($request->all());

		return response()->json($user);
	}

	/*delete a post*/
	public function delete($id){
		$user = User::find($id);
		$user->delete();

		return response()->json("Deleted successfully");
	}
}
?>