<?php

declare(strict_types=1);

class Card {

	/**
	 * @var array<string> SUITS
	 */
	public const SUITS = [
		'♠', 
		'♥', 
		'♦', 
		'♣'
	];
	
	/**
	 * @var array<string> VALUES
	 */
	public const VALUES = [
		'A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'
	];

	/**
	 * @param int $suit
	 * @param int $value
	 */
	public function __construct(
		private int $suit,
		private int $value
	) {}

	/**
	 * @return array<Card>
	 */
	public static function shuffle() : array
	{	
		$cards = [];
		foreach (self::SUITS as $suit => $label) {
			foreach (self::VALUES as $value => $label) {
				$cards[] = new Card($suit, $value);
			}
		}
		shuffle($cards);
		return $cards;
	}

	/**
	 * @param array<Player> $players
	 * @param array<Card> $cards
	 */
	public static function distribute($players, $cards): void
	{
		foreach ($players as $i => $player) {
			/** @var int $offset */
			$offset = $i * (count($cards) / count($players));
			/** @var int $length */
			$length = count($cards) / count($players);
			$player->setCards(array_slice($cards, $offset, $length));
		}
	}

	/**
	 * @return string
	 */
	public function getSuits(): string
	{
		return self::SUITS[$this->suit];
	}

	/**
	 * @return string
	 */
	public function getValue(): string
	{
		return self::VALUES[$this->value];
	}

}