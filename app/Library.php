<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\Nestedset;

class Library extends Model
{
	protected $table = 'libraries';

	public $timestamps = false;

	protected $fillable = [
		'title', 'description'
	];

	public function products()
	{
		return $this->belongsToMany('App\Product');
	}

	public static function boot()
	{
		parent::boot();

		self::deleting(function($library)
		{
			$libraries_id = $library->descendants()->lists('id');
			$libraries_id[] = $library->getKey();
			$products = Product::whereHas('libraries', function($q) use ($libraries_id) {
					$q->whereIn('libraries.id', $libraries_id);
				})->get();

			if ($library->getDescendantCount() > 0)
			{
				$html = "This library has children, you can't delete this library until you removed all the children";

				\Session::flash('errorMsg', $html);

				return false;
			}
			else if($products->count() > 0)
			{
				$html = "Cannot delete this library due to still has related product(s).<br>\n";
				$html .= "<ul>\n";
				foreach ($products as $product) {
					$html .= "    <li>$product->name</li>\n";
				}
				$html .= "</ul>\n";

				\Session::flash('errorMsg', $html);

				return false;
			}
		});
	}
}
