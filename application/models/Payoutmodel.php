<?php

class Payoutmodel extends CI_Model{


	function __construct(){

		parent::__construct();
	}

	function generateAllPayout($from, $to, $storeID){

		$this->db->query('DROP TRIGGER IF EXISTS update_new_ids');
		
		$this->db->query('CREATE TRIGGER update_new_ids
						    AFTER UPDATE ON store_sales
						    FOR EACH ROW
						    INSERT INTO last_payout_ids(item_id) VALUES(NEW.id)
						');

		$this->db->query("
										UPDATE store_sales ss JOIN product_percent pp 
										ON pp.bar_code = ss.item_code SET ss.prod_percent = pp.store_percent, 
										ss.perc_amount = ((ss.sale_price*ss.item_qty)*pp.store_percent)/100
										WHERE date(ss.order_date) BETWEEN '".$from."' AND '".$to."' AND ss.store_id = ".$storeID
										." AND ss.prod_percent = 0"
								 );

		$this->db->query('DROP TRIGGER IF EXISTS update_new_ids');
		
		$PayoutTotalAmount = $this->db->query(
												'SELECT sum(perc_amount) as total_amount FROM store_sales WHERE id IN (
													SELECT item_id FROM last_payout_ids)'
											 );

		$PayoutTotalAmount = $PayoutTotalAmount->row();

		$this->db->query("
							INSERT INTO payout_details(store_id, payout_date_from, payout_date_to, payout_amount)
							VALUES(".$storeID.",'".$from."','".$to."',".round($PayoutTotalAmount->total_amount).")
						");

		$payOutID = $this->db->insert_id();

		$this->db->query("UPDATE store_sales SET payout_id = ".$payOutID." WHERE id IN (SELECT item_id FROM last_payout_ids)");

		$this->db->truncate('last_payout_ids');
	}

	function getStoresList(){

		$Query = $this->db->get('stores_list');
		return $Query->result();
	}
}