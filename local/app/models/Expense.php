<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class Expense extends \Eloquent implements SluggableInterface {

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'itemName',
        'save_to'    => 'slug',
    );

	// Add your validation rules here
	public static $rules = [
		 'itemName' => 'required',
         'price'     =>  'required'
	];



	// Don't forget to fill this array
	protected $fillable = [];

    protected $guarded  =   ['id'];

}