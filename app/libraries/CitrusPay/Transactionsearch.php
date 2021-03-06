<?php

class TransactionSearch extends CitrusPay_ApiResource
{
	private $resp_code;

	private $resp_msg;

	private $txn_id;

	private $pg_txn_id;

	private $auth_id_code;

	private $rrn;

	private $txn_type;

	private $txn_date_time;

	private $CV_resp_code;

	private $amount;

	private $merchant_txn_id;
	
	private $original_amount;

	private $adjustment;

	private $rule_name;

	private $offer_type;     
	
	private $transaction_amount;
	
	public function get_resp_code() {
		return $this->resp_code;
	}

	public function set_resp_code($resp_code) {
		$this->resp_code = $resp_code;
	}

	public function get_resp_msg() {
		return $this->resp_msg;
	}

	public function set_resp_msg($resp_msg) {
		$this->resp_msg = $resp_msg;
	}

	public function get_txn_id() {
		return $this->txn_id;
	}

	public function set_txn_id($txn_id) {
		$this->txn_id = $txn_id;
	}

	public function get_pg_txn_id() {
		return $this->pg_txn_id;
	}

	public function set_pg_txn_id($pg_txn_id) {
		$this->pg_txn_id = $pg_txn_id;
	}

	public function get_auth_id_code() {
		return $this->auth_id_code;
	}

	public function set_auth_id_code($auth_id_code) {
		$this->auth_id_code = $auth_id_code;
	}

	public function get_rrn() {
		return $this->rrn;
	}

	public function set_rrn($rrn) {
		$this->rrn = $rrn;
	}

	public function get_txn_type() {
		return $this->txn_type;
	}

	public function set_txn_type($txn_type) {
		$this->txn_type = $txn_type;
	}

	public function get_txn_date_time() {
		return $this->txn_date_time;
	}

	public function set_txn_date_time($txn_date_time) {
		$this->txn_date_time = $txn_date_time;
	}

	public function get_CV_resp_code() {
		return $this->CV_resp_code;
	}

	public function set_CV_resp_code($CV_resp_code) {
		$this->CV_resp_code = $CV_resp_code;
	}
	
	public function get_amount() {
		return $this->amount;
	}
	
	public function set_amount($amount){
		$this->amount = $amount;
	}
	
	public function get_merchant_txn_id() {
		return $this->merchant_txn_id;
	}
	
	public function set_merchant_txn_id($merchant_txn_id){
		$this->merchant_txn_id = $merchant_txn_id;
	}
	
		public function get_original_amount() {
		return $this->original_amount;
	}

	public function set_original_amount($original_amount) {
		$this->original_amount = $original_amount;
	}

	public function get_adjustment() {
		return $this->adjustment;
	}

	public function set_adjustment($adjustment) {
		$this->adjustment = $adjustment;
	}

	public function get_rule_name() {
		return $this->rule_id;
	}

	public function set_rule_name($rule_id) {
		$this->rule_id = $rule_id;
	}

	public function get_offer_type() {
		return $this->offer_type;
	}

	public function set_offer_type($offer_type) {
		$this->offer_type = $offer_type;
	} 
	
	public function get_transaction_amount() {
		return $this->transaction_amount;
	}
	
	public function set_transaction_amount($transaction_amount) {
		$this->transaction_amount = $transaction_amount;
	}

	public static function create($params=null, $apiKey=null)
	{
		$class = get_class();
		$TSObj = new Transactionsearch();
		$TSObj = self::_genericCreate($class, $params, $apiKey);
		return $TSObj;
	}

}
