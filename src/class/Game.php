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
		$this->cards = Card::shuffle();
		Card::distribute($this->players, $this->cards);
	}

	/**
	 * @param array<Player> $players
	 * @return void
	 */
	private function requirements(array $players): void
	{
		foreach ($players as $player) {
			if (! $player instanceof Player) {
				Log::write('Game requirements are not satisfied - invalid player given');
				throw new Exception('Invalid player');
			} else if ($player->getPlayingStatus()) {
				Log::write('Game requirements are not satisfied - the given player already playing');
				throw new Exception('Player already playing');
			}
		}

		if (!(count($players) === 2 || count($players) === 4)) {
			Log::write('Game requirements are not satisfied - invalid number of players');
			throw new Exception('Invalid number of players. Please give 2 or 4 players');
		}
		
		Log::start();
		$player->setPlayingStatus(true);
	}

	/**
	 * @return array<Player>
	 */
	public function getPlayers(): array
	{
		return $this->players;
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
	 * @param Player $winner
	 * @return void
	 */
	public function setWinner(Player $winner): void
	{
		$this->winner = $winner;
	}

	/**
	 * @return void
	 */
	public function nextRound(): void
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
		Log::stop();
	}

}