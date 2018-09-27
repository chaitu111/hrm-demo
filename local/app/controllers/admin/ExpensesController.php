<?php

class ExpensesController extends \AdminBaseController {



    public function __construct()
    {
        parent::__construct();
        $this->data['expensesOpen'] ='active open';
        $this->data['pageTitle'] ='Expense';
    }

    public function index()
	{
		$this->data['expenses']          =   Expense::all();
        $this->data['expensesActive']    =   'active';

		return View::make('admin.expenses.index', $this->data);
	}

    //Datatable ajax request
    public function ajax_expenses()
    {
        $result = Expense::
            select('id','itemName','purchaseFrom','purchaseDate','price')
            ->orderBy('created_at','desc');

        return Datatables::of($result)
            ->edit_column('purchaseDate',function($row){
                return date('d-M-Y',strtotime($row->purchaseDate));
            })
            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.expenses.edit\',$id)}}" ><i class="fa fa-edit"></i> View/Edit</a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $itemName }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i> Delete</a>')
            ->make();
    }


	public function create()
	{
        $this->data['expensesAddActive']    =   'active';


		return View::make('admin.expenses.create',$this->data);
	}

	/**
	 * Store a newly created expense in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($input = Input::all(), Expense::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        //----------------   Check if Bill is attached or not


        $input['purchaseDate']   =   date('Y-m-d',strtotime( $input['purchaseDate']));
	    $expense =	Expense::create($input);

        if (Input::hasFile('bill')) {

            $expense   = expense::find($expense->id);

            $path = public_path()."/expense/bills/";
            File::makeDirectory($path, $mode = 0777, true, true);

            $file 	= Input::file('bill');
            $extension      = $file->getClientOriginalExtension();
            $filename	= "bill-{$expense->slug}.$extension";
            Input::file('bill')->move($path, $filename);
            $expense->bill = $filename;

            $expense->save();

        }
		return Redirect::route('admin.expenses.index')->with('success',"<strong>{$input['itemName']}</strong> successfully added to the Database");;
	}



	/**
	 * Show the form for editing the specified expense.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['expense'] = Expense::find($id);
		return View::make('admin.expenses.edit', $this->data);
	}

	/**
	 * Update the specified expense in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$expense = Expense::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Expense::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['purchaseDate']   =   date('Y-m-d',strtotime( $data['purchaseDate']));


        if (Input::hasFile('bill')) {

            $path = public_path()."/expense/bills/";
            File::makeDirectory($path, $mode = 0777, true, true);

            $file 	= Input::file('bill');
            $extension      = $file->getClientOriginalExtension();
            $filename	= "bill-{$expense->slug}.$extension";

            Input::file('bill')->move($path, $filename);
            $data['bill'] = $filename;

        }else{
            $data['bill'] = $data['billhidden'];
        }
            unset($data['billhidden']);
		$expense->update($data);

        Session::flash('success',"<strong>{$data['itemName']}</strong> updated successfully");
		return Redirect::route('admin.expenses.edit',$id);
	}

	/**
	 * Remove the specified expense from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Request::ajax()) {

			Expense::destroy($id);
			$output['success'] = 'deleted';

			return Response::json($output, 200);
		}
	}

}
