<?php
	/**
	 * Created by PhpStorm.
	 * User: Tosh
	 * Date: 23/11/2017
	 * Time: 17:09
	 */
	
	namespace App\Transformer;
	
	
	use App\User;
	use League\Fractal\TransformerAbstract;
	
	class UserTransformer extends TransformerAbstract
	{
		public function transform(User $user)
		{
			return [
				//
				
				'id'       => (int)$user->getKey(),
				'name'     => (string)$user->name,
				'email'    => (string)$user->email,
				'username' => (string)$user->username,
				'avatar'   => (string)$user->avatar,
			];
		}
	}