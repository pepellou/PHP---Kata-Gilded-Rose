<?php

class ItemUpdater {

	public function updateQuality(
		$item
	) {
		$item->decreaseQuality();
		if ($item->isExpired()) {
			$item->decreaseQuality();
		}
	}

	public function updateSellIn(
		$item
	) {
		$item->decreaseSellIn();
	}

}

?>
