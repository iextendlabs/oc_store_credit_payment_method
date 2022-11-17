<?php
class ModelExtensionPaymentStoreCredit extends Model {
	public function getMethod($address, $total) {
		$this->load->language('extension/payment/storecredit');

		if ($this->customer->getBalance()>=$total) {
			$status = true;
		} else {
			$status = false;
		}

		$method_data = array();

		if ($status) {
			$method_data = array(
				'code'       => 'storecredit',
				'title'      => $this->language->get('text_title'),
				'terms'      => '',
				'sort_order' => $this->config->get('storecredit_sort_order')
			);
		}

		return $method_data;
	}
}