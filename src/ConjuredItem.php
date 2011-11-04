<?php

require_once 'src/ItemGildedRose.php';

class ConjuredItem extends ItemGildedRose {

	public function updateQuality(
	) {
		$this->decreaseQuality();
		$this->decreaseQuality();
		if ($this->isExpired()) {
			$this->decreaseQuality();
			$this->decreaseQuality();
		}
	}

}

?>
