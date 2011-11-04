<?php

class ConjuredUpdater extends ItemUpdater {

	public function updateQuality(
		$item
	) {
		$item->decreaseQuality();
		$item->decreaseQuality();
		if ($item->isExpired()) {
			$item->decreaseQuality();
			$item->decreaseQuality();
		}
	}

}

?>

