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
	}

	/**
	 * @param array<Player> $players
	 * @return void
	 */
	private function requirements(array $players): void
	{
		foreach ($players as $player) {
			if (! $player instanceof Player) {
				throw new Exception('Invalid player');
			} else if ($player->getPlayingStatus()) {
				throw new Exception('Player already playing');
			} else {
				$player->isPlaying(true);
			}
		}

		if (!(count($players) === 2 || count($players) === 4)) {
			throw new Exception('Invalid number of players. Please give 2 or 4 players');
		}
		
		$this->players = $players;

	}
	
	/**
	 * @return void
	 */
	private function start(): void
	{

	}

	/**
	 * @return void
	 */
	private function battle(): void
	{
		
	}

	/**
	 * @return array<void>
	 */
	private function defineHighestCard(): array
	{
		return [];
	}

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
	 * @return void
	 */
	private function nextRound(): void
	{
		$this->rounds++;
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
		// Log::stop();
	}

}