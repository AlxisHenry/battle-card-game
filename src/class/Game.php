<?php

declare(strict_types=1);

class Game {
	
	/**
	 * @var array<Player> $players
	 */
	private array $players = [];

	/**
	 * @var Player $winner
	 */
	private Player $winner;

	/**
	 * @var int $rounds
	 */
	private int $rounds = 0;

	/**
	 * @var array<Card> $cards
	 */
	private array $cards = [];

	/**
	 * @param array<Player> $players
	 */
	public function __construct($players)
	{
		$this->requirements($players);
		Card::shuffle($this);
		Card::distribute($this);
		$this->start();
	}

	/**
	 * Check if the game can start
	 * 
	 * @param array<Player> $players 
	 * @return void
	 */
	private function requirements(array $players): void
	{
		/**
		 * $players need to be an array of Player objects
		 */
		foreach ($players as $player) {
			if (!($player instanceof Player))
				throw new Exception('Invalid player');
			if ($player->getPlayingStatus())
				throw new Exception('Player already playing');
			/**
			 * Set playing status of the player to true 
			 */
			$player->isPlaying(true);
		}

		/**
		 * Game start only with 2 or 4 players
		 */
		if (!(count($players) === 2 || count($players) === 4)) 
			throw new Exception('Invalid number of players. Please give 2 or 4 players');
		
		$this->players = $players;

	}
	
	/**
	 * Start the game
	 * 
	 * @return void
	 */
	private function start(): void
	{	
		/**
		 * While no winner found, play a round
		 */
		while(!isset($this->winner))
		{
			$this->playRound();
		}
	}

	/**
	 * Play a round
	 * 
	 * @return void
	 */
	private function playRound(): void
	{
		/** Increment the number of rounds */
		$this->rounds++;
		/** Start the battle */
		$this->battle();
	}

	/**
	 * Do a battle between players
	 * 
	 * @return void
	 */
	private function battle(): void {}

	/**
	 * @param array<String> $cards
	 * @return void
	 */
	private function checkForEquality(array $cards): void {}

	/**
	 * @return void
	 */
	private function playedCards(): void {}

	/**
	 * @return void
	 */
	private function defineRoundWinner(): void {}

	/**
	 * @return array<Player>
	 */
	public function getPlayers(): array
	{
		return $this->players;
	}

	/**
	 * @return array<Card>
	 */
	public function getCards(): array
	{
		return $this->cards;
	}

	/**
	 * @return Player
	 */
	public function getWinner(): Player
	{
		return $this->winner;
	}	

	/**
	 * @return int
	 */
	public function getRound(): int
	{
		return $this->rounds;
	}

	/**
	 * @param array<Card> $cards
	 * @return void
	 */
	public function setCards(array $cards): void
	{
		$this->cards = $cards;
	}

	/**
	 * @param Player $winner
	 * @return void
	 */
	private function setWinner(Player $winner): void
	{
		$this->winner = $winner;
	}

	/**
	 * @return array<string>
	 */
	public function playersName(): array
	{
		$playersName = [];
		foreach ($this->players as $player) {
			$playersName[] = $player->getName();
		}
		return $playersName;
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return "Game in progress: round n°{$this->rounds}. Players : " . implode(', ', $this->playersName());
	}

	public function __destruct()
	{
	}

}