<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery {
	protected $safeParms = [
		'name' => ['eq'],
		'type' => ['eq'],
		'email' => ['eq'],
		'address' => ['eq'],
		'city' => ['eq'],
		'state' => ['eq'],
		'postCode' => ['eq', 'gt', 'lt']
	];
	
	protected $columnMap = [
		'postCode' => 'postal_code'
	];

	protected $operatorMap = [
		'eq' => '=',
		'lt' => '<',
		'lte' => '<=',
		'gt' => '>',
		'gte' => '>='
	];

	public function transform(Request $request) {
		$eloQuery = [];

		foreach ($this->safeParms as $parm => $operators) {
			$query = $request->query($parm);
		}

		return $eloQuery;
	}
}