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
			"incr. 1 si sellIn > 10"            => array(11, 10, 11),
			"incr. 2 si 5 < sellIn <= 10 (max)" => array(10, 10, 12),
			"incr. 2 si 5 < sellIn <= 10 (min)" => array(6,  10, 12),
			"incr. 3 si 0 < sellIn <= 5 (max)"  => array(5,  10, 13),
			"incr. 3 si 0 < sellIn <= 5 (min)"  => array(1,  10, 13),
			"se pone a 0 si sellIn <= 0 (max)"  => array(0,  10, 0),
			"se pone a 0 si sellIn <= 0 (...)"  => array(-1, 10, 0)
		);
	}

	/**
	 * @dataProvider backstage_rules
	 */
	public function test_backstage_passes_incrementan_calidad_cada_vez_mas(
		$sellIn, 
		$quality,
		$expected
	) {
		$pass = ItemBuilder::newItem()
			->withName("Backstage passes to a TAFKAL80ETC concert")
			->withSellIn($sellIn)
			->withQuality($quality)
			->build();
		GildedRose::updateQuality(array($pass));
		$this->assertEquals($expected, $pass->quality);
	}

}

?>
