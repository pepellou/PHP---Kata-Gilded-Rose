<?php

require_once 'src/ItemGildedRose.php';

class BackstagePassItem extends ItemGildedRose {

	public function updateQuality(
	) {
		$this->increaseQuality();
		if ($this->isCloseToExpire()) {
			$this->increaseQuality();
		}
		if ($this->isVeryCloseToExpire()) {
			$this->increaseQuality();
		}
		if ($this->isExpired()) {
			$this->setMinimumQuality();
		}
	}

}

?>
