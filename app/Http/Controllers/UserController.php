<?php
	
	namespace App\Http\Controllers;
	
	use App\Traits\Paginates;
	use App\Transformer\UserTransformer;
	use App\User;
	use Illuminate\Http\Request;
	
	class UserController extends Controller
	{
		//
		use Paginates;
		
		public function index(Request $request)
		{
			$builder = User::where('id', '>', 0);
			
			return $this->paginate($request, $builder, new UserTransformer());
		}
	}
