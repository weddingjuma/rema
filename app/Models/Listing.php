<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Listing extends BaseTable {

	use SoftDeletes;

	
	// Add your validation rules here
	public static $rules = [
		 'name' => 'required',
		 'address' => 'required',
		'guests' => 'required',
		'beds' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name','guests','beds','address'];

	protected $guarded = ['id'];

	protected $dates = ['deleted_at'];

	public function bookings()
	{
		return $this->hasMany('Booking');
	}

	public static function boot()
	{
		parent::boot();

		static::creating(function($listingTable)
		{
			if (Auth::check()) {
				$listingTable->changed_by = Auth::id();
			}
		});

	}

}