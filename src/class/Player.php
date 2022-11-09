<?php

declare(strict_types=1);

class Player {

	/**
	 * @var array<Card> $cards
	 */
	private array $cards = [];

	/**
	 * @var int $win
	 */
	private int $win = 0;

	/**
	 * @var int $count
	 */
	public static int $count = 0;

	/**
	 * @var bool $isPlaying
	 */
	private bool $isPlaying = false;
	
	/**
	 * @param string $name
	 * @param string $email
	 * @param int $age
	 * @param bool $gender
	 */
	public function __construct(
		private string $name,
		private string $email,
		private int $age,
		private bool $gender
	) 
	{
		self::$count++;
	}

	/**
	 * @return void
	 */
	public function win(): void
	{
		$this->win++;
	}
	
	/**
	 * @return array<Card>
	 */
	public function getCards(): array 
	{
		return $this->cards;
	}

	/**
	 * @return string
	 */
	public function getName(): string 
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string 
	{
		return $this->email;
	}

	/**
	 * @return int
	 */
	public function getAge(): int 
	{
		return $this->age;
	}

	/**
	 * @return string
	 */
	public function getGender(): string 
	{
		return $this->gender ? 'Men' : 'Women';
	}

	/**
	 * @return bool
	 */
	public function getPlayingStatus(): bool
	{
		return $this->isPlaying;
	}

	/**
	 * @return Card
	 */
	public function getFirstCard(): Card 
	{
		return $this->cards[0];
	}

	/**
	 * @param array<Card> $cards
	 */
	public function setCards(array $cards): void
	{
		$this->cards = $cards;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void 
	{
		$this->name = $name;
	}

	/**
	 * @param string $email
	 */
	public function setEmail(string $email): void 
	{
		$this->email = $email;
	}

	/**
	 * @param int $age
	 */
	public function setAge(int $age): void 
	{
		$this->age = $age;
	}

	/**
	 * @param bool $gender
	 * @return void
	 */
	public function setGender(bool $gender): void 
	{
		$this->gender = $gender;
	}

	/**
	 * @param bool $status
	 * @return void
	 */
	public function isPlaying(bool $status): void
	{
		$this->isPlaying = $status;
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return "{$this->getName()} has {$this->win} wins.";
	}

	public function __destruct()
	{
		self::$count--;
	}

}