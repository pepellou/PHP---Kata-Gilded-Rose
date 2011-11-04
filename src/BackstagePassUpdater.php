<?php

class BackstagePassUpdater extends ItemUpdater {

	public function updateQuality(
		$item
	) {
		$item->increaseQuality();
		if ($item->isCloseToExpire()) {
			$item->increaseQuality();
		}
		if ($item->isVeryCloseToExpire()) {
			$item->increaseQuality();
		}
		if ($item->isExpired()) {
			$item->setMinimumQuality();
		}
	}

}

?>

