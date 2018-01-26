<?php
	
	namespace App\Http\Controllers;
	
	use Fractal;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Routing\Controller as BaseController;
	use Illuminate\Foundation\Validation\ValidatesRequests;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Collection;
	use League\Fractal\TransformerAbstract;
	use Response;
	
	
	class Controller extends BaseController
	{
		use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
		
		
		/**
		 * @param Model               $item
		 * @param TransformerAbstract $transformer
		 * @param array               $meta
		 * @return \Illuminate\Http\Response
		 */
		protected function itemResponse(Model $item, TransformerAbstract $transformer, array $meta = array())
		{
			if (is_null($meta) || (count($meta) == 0)) {
				$meta = (object)array();
			}
			$data = Fractal::item($item, $transformer)->toArray();
			
			return Response::make(array('meta' => $meta, 'data' => $data['data']), 200);
		}
		
		/**
		 * @param Collection          $collection
		 * @param TransformerAbstract $transformer
		 * @param array               $meta
		 * @return \Illuminate\Http\Response
		 */
		protected function collectionResponse(Collection $collection, TransformerAbstract $transformer, array $meta = array())
		{
			if (is_null($meta) || (count($meta) == 0)) {
				$meta = (object)array();
			}
			
			$data = Fractal::collection($collection, $transformer)->toArray();
			
			return Response::make(array('meta' => $meta, 'data' => $data['data']), 200);
		}
		
		
		/**
		 * @param       $data
		 * @param array $meta
		 * @return \Illuminate\Http\Response
		 */
		public function itemCreatedResponse($data, $meta = array())
		{
			if (is_null($meta) || (count($meta) == 0)) {
				$meta = (object)array();
			}
			
			if (empty($data)) {
				$data = (object)array();
			}
			
			return Response::make(array('meta' => $meta, 'data' => $data), 201);
		}
		
		/**
		 * @param       $data
		 * @param array $meta
		 * @return \Illuminate\Http\Response
		 */
		public function itemUpdatedResponse($data = array(), $meta = array())
		{
			if (empty($meta)) {
				$meta = (object)array();
			}
			
			if (empty($data)) {
				$data = (object)array();
			}
			
			return Response::make(array('meta' => $meta, 'data' => $data), 200);
		}
		
		/**
		 * @param       $data
		 * @param array $meta
		 * @return \Illuminate\Http\Response
		 */
		public function itemDeletedResponse($data, $meta = array())
		{
			if (empty($meta)) {
				$meta = (object)array();
			}
			
			if (empty($data)) {
				$data = (object)array();
			}
			
			return Response::make(array('meta' => $meta, 'data' => $data), 200);
		}
		
		/**
		 * @param array $data
		 * @param array $meta
		 * @return \Illuminate\Http\Response
		 */
		public function arrayResponse(array $data, array $meta = array())
		{
			if (empty($meta)) {
				$meta = (object)array();
			}
			
			return Response::make(array('meta' => $meta, 'data' => $data), 200);
		}
		
	}
