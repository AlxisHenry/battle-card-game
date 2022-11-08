<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require 'src/class/Card.php';
require 'src/class/Game.php';

final class CardTest extends TestCase
{

	public function testNewCardCanBeCreated(): void
	{
		$properties = [
			'suit' => rand(0, count(Card::SUITS)),
			'value' => rand(0, count(Card::VALUES))
		];

		$card = new Card($properties['suit'], $properties['value']);
		$this->assertInstanceOf(
			Card::class,
			$card
		);
	}

	public function testAllCardsCanBeCreated(): void
	{
		$cards = [];
		foreach (Card::SUITS as $suit => $label) {
			foreach (Card::VALUES as $value => $label) {
				$cards[] = new Card($suit, $value);
			}
		}

		$this->assertContainsOnlyInstancesOf(
			Card::class,
			$cards
		);

	}

	public function testPropertiesAreCorresponding(): void 
	{
		$properties = [
			'suit' => 1,
			'value' => 3
		];

		$card = new Card($properties['suit'], $properties['value']);

		$this->assertEquals(
			'♥',
			$card->getSuits()
		);

		$this->assertEquals(
			'4',
			$card->getValue()
		);

	}

}