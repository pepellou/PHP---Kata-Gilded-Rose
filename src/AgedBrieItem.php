<?php

require_once 'src/ItemGildedRose.php';

class AgedBrieItem extends ItemGildedRose {

	public function updateQuality(
	) {
		$this->increaseQuality();
		if ($this->isExpired()) {
			$this->increaseQuality();
		}
	}

}

?>
