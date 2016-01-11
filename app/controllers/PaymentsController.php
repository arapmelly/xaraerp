<?php

class PaymentsController extends \BaseController {

	/**
	 * Display a listing of payments
	 *
	 * @return Response
	 */
	public function index()
	{
		$payments = Payment::all();
		$erporders = Erporder::all();
		$erporderitems = Erporderitem::all();

		return View::make('payments.index', compact('payments','erporderitems','erporders'));
	}

	/**
	 * Show the form for creating a new payment
	 *
	 * @return Response
	 */
	public function create()
	{
		$erporders = Erporder::all();
		$erporderitems = Erporderitem::all();
		return View::make('payments.create',compact('erporders','erporderitems'));
	}

	/**
	 * Store a newly created payment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Payment::$rules, Payment::$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$payment = new Payment;

		$payment->erporder_id = Input::get('order');
		$payment->amount_paid = Input::get('amount');
		$payment->receipt_no = Input::get('receipt');
		$payment->received_by = Input::get('received_by');
		$payment->date = date("Y-m-d",strtotime(Input::get('pay_date')));
		$payment->save();

		return Redirect::route('payments.index')->withFlashMessage('Payment successfully created!');
	}

	/**
	 * Display the specified payment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$payment = Payment::findOrFail($id);

		return View::make('payments.show', compact('payment'));
	}

	/**
	 * Show the form for editing the specified payment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = Payment::find($id);
		$erporders = Erporder::all();
		$erporderitems = Erporderitem::all();

		return View::make('payments.edit', compact('payment','erporders','erporderitems'));
	}

	/**
	 * Update the specified payment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$payment = Payment::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Payment::$rules, Payment::$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $payment->erporder_id = Input::get('order');
		$payment->amount_paid = Input::get('amount');
		$payment->receipt_no = Input::get('receipt');
		$payment->received_by = Input::get('received_by');
		$payment->date = date("Y-m-d",strtotime(Input::get('pay_date')));
		$payment->update();

		return Redirect::route('payments.index')->withFlashMessage('Payment successfully updated!');
	}

	/**
	 * Remove the specified payment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Payment::destroy($id);

		return Redirect::route('payments.index')->withDeleteMessage('Payment successfully deleted!');
	}

}
