<?php

declare(strict_types=1);

class Card {

	/**
	 * Cards colors
	 * 
	 * @var array<string> SUITS
	 */
	public const SUITS = [
		'♠', 
		'♥', 
		'♦', 
		'♣'
	];
	
	/**
	 * Cards values
	 * 
	 * @var array<string> VALUES
	 */
	public const VALUES = [
		'2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'
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
	 * Shuffle the cards
	 * 
	 * @param Game $game
	 * @return void
	 */
	public static function shuffle(Game $game) : void
	{	
		/** 
		 * @var array<Card> $cards 
		 */
		$cards = [];

		/**
		 * Generate all the cards 
		 */
		foreach (self::SUITS as $suit => $label) {
			foreach (self::VALUES as $value => $label) {
				$cards[] = new Card($suit, $value);
			}
		}
		
		shuffle($cards);
		$game->setCards($cards);
	}

	/**
	 * Distribute the cards to the players of the game
	 * 
	 * @param Game $game
	 * @return void
	 */
	public static function distribute(Game $game): void
	{
		/** 
		 * @var array<Player> $players Players of the current game 
		 */
		$players = $game->getPlayers();

		/** 
		 * @var array<Card> $cards Cards of the current game 
		 */
		$cards = $game->getCards();

		foreach ($players as $i => $player) {
			/** @var int $offset */
			$offset = $i * (count($cards) / count($players));
			/** @var int $length Number of cards for each player */
			$length = count($cards) / count($players);
			/**
			 * Distribute the cards to the current players
			 */
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