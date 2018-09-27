<?php

class SettingsController extends \AdminBaseController {



    public function __construct()
    {
        parent::__construct();
        $this->data['settingOpen']  =   'active open';
        $this->data['pageTitle']    =    'Settings';
    }

	public function edit()
	{
        $this->data['settingActive']    =   'active';
        $this->data['setting']          =    Setting::all()->first();

		return View::make('admin.settings.edit', $this->data);
	}


	public function update($id)
	{
		$setting = Setting::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Setting::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        unset($data['logo']);
        // Logo Image Upload
        if (Input::hasFile('logo')) {
            $path       = public_path()."/assets/admin/layout/img/";
            File::makeDirectory($path, $mode = 0777, true, true);

            $image 	    = Input::file('logo');
            $extension  = $image->getClientOriginalExtension();
            $filename	= "logo.$extension";
            $filename_big	= "logo-big.$extension";

            Image::make($image->getRealPath())->save($path.$filename);
            Image::make($image->getRealPath())->save($path.$filename_big);

            $data['logo']   =   $filename;

        }
        $currencyArray   =   explode(':',$data['currency']);
        $data['currency']   =  $currencyArray[1];
        $data['currency_icon']   =  $currencyArray[0];
		$setting->update($data);

        Session::flash('success', '<strong>Success! </strong>Updated Successfully');
		return Redirect::route('admin.settings.edit','setting');
	}



}
