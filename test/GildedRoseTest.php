<?php

include_once 'src/GildedRose.php';
include_once 'test/ItemBuilder.php';

class GildedRoseTest extends PHPUnit_Framework_TestCase {

	public function test_items_degradan_calidad(
	) {
		$unItem = ItemBuilder::newItem()
			->withQuality(5)
			->build();
		GildedRose::updateQuality(array($unItem));
		$this->assertEquals(4, $unItem->quality);
	}

	public function test_venta_pasada_calidad_degrada_doble(
	) {
		$unItem = ItemBuilder::newItem()
			->withSellIn(-1)
			->withQuality(5)
			->build();
		GildedRose::updateQuality(array($unItem));
		$this->assertEquals(3, $unItem->quality);
	}

	public function test_calidad_nunca_negativa(
	) {
		$unItem = ItemBuilder::newItem()
			->withQuality(0)
			->build();
		GildedRose::updateQuality(array($unItem));
		$this->assertEquals(0, $unItem->quality);
	}

	public function test_aged_brie_incrementa_calidad(
	) {
		$agedBrie = ItemBuilder::newItem()
			->withName("Aged Brie")
			->withQuality(5)
			->build();
		GildedRose::updateQuality(array($agedBrie));
		$this->assertEquals(6, $agedBrie->quality);
	}

	public function test_calidad_nunca_mayor_de_50(
	) {
		$agedBrie = ItemBuilder::newItem()
			->withName("Aged Brie")
			->withQuality(50)
			->build();
		GildedRose::updateQuality(array($agedBrie));
		$this->assertEquals(50, $agedBrie->quality);
	}

	public function test_sulfuras_no_cambia(
	) {
		$sulfuras = ItemBuilder::newItem()
			->withName("Sulfuras, Hand of Ragnaros")
			->withSellIn(10)
			->withQuality(10)
			->build();
		GildedRose::updateQuality(array($sulfuras));
		$this->assertEquals(10, $sulfuras->sellIn);
		$this->assertEquals(10, $sulfuras->quality);
	}

	public static function backstage_rules(
	) {
		return array(
			"incrementa en uno si sellIn > 10" => array(11, 1),
			"incrementa en dos si 5 < sellIn <= 10 (a)" => array(10, 2),
			"incrementa en dos si 5 < sellIn <= 10 (b)" => array(6, 2),
			"incrementa en tres si 0 < sellIn <= 5 (a)" => array(5, 3),
			"incrementa en tres si 0 < sellIn <= 5 (b)" => array(1, 3),
			"nulo si sellIn <= 0 (a)" => array(0, null),
			"nulo si sellIn <= 0 (b)" => array(-2, null)
		);
	}

	/**
	 * @dataProvider backstage_rules
	 */
	public function test_backstage_passes_incrementan_calidad_cada_vez_mas(
		$sellIn, 
		$increment
	) {
		$quality = 10;
		$pass = ItemBuilder::newItem()
			->withName("Backstage passes to a TAFKAL80ETC concert")
			->withSellIn($sellIn)
			->withQuality($quality)
			->build();
		GildedRose::updateQuality(array($pass));
		if ($increment == null)
			$this->assertEquals(0, $pass->quality);
		else
			$this->assertEquals($quality + $increment, $pass->quality);
	}

}

?>
