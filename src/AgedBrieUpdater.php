<?php

class AgedBrieUpdater extends ItemUpdater {

	public function updateQuality(
		$item
	) {
		$item->increaseQuality();
		if ($item->isExpired()) {
			$item->increaseQuality();
		}
	}

}

?>
