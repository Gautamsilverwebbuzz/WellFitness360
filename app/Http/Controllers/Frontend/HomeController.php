<?php 
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Blog;

class HomeController extends Controller
{

	public function index(){
		
	}

	public function blog(){
		$blogs = Blog::where('status','1')->get()->toArray();
		return view('Frontend.blog',compact('blogs'));
	}

	public function blogDetails($id){
		$blogsdetails = Blog::where('url_alias',$id)->first()->toArray();
		$blogs = Blog::where('status','1')->limit('3')->get()->toArray();
		return view('Frontend.blogdetails',compact('blogsdetails','blogs'));
	}
}

?>