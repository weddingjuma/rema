<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller {

	/**
	 * Setup the layouts used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}