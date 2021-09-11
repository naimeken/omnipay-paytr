<?php

namespace Omnipay\Paytr\Models;

use Omnipay\Paytr\Helpers\Helper;

class CardInquiryRequestModel extends BaseModel
{
	/**
	 * Mağaza no: PayTR tarafından size verilen Mağaza numarası
	 *
	 * @required
	 * @var integer
	 */
	public $merchant_id;

	/**
	 * User reference id.
	 *
	 * @required
	 * @var string
	 */
	public $utoken;

	/**
	 * Paytr Token: İsteğin sizden geldiğine ve içeriğin değişmediğine emin olmamız için oluşturacağınız değerdir
	 *
	 * @required
	 * @var string
	 */
	public $paytr_token;

	public function generateToken($salt, $key, $id): void
	{
		$hash_string = $this->utoken . $salt;

		$this->paytr_token = Helper::hash($key, $hash_string);
	}
}