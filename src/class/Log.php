<?php

declare(strict_types=1);

class Log {

	/**
	 * @var string FILE
	 */
	private const FILE = 'logs/game.log';

	/**
	 * @var string MODE
	 */
	private const MODE = 'w';

	/**
	 * @var string DELIMITER_PRIMARY
	 */
	private const DELIMITER_PRIMARY = "=====================================================";

	/**
	 * @var string DELIMITER_SECONDARY
	 */
	private const DELIMITER_SECONDARY = '-----------------------------------------------------';

	/**
	 * @var resource|false $log
	 */
	private static $log;

	/**
	 * @param string $message
	 * @return void
	 */
	public static function write(string $message): void
	{
		if (!self::$log) throw new Exception('Log feature is not available');
		fwrite(self::$log, $message);
	}

	/**
	 * @return void
	 */
	public static function start(): void
	{
		self::$log = fopen(self::FILE, self::MODE);
		self::write(self::DELIMITER_PRIMARY);
		self::write('============= '.date('H:i:s').' --- GAME STARTED =============');
		self::write(self::DELIMITER_PRIMARY);
	} 
	
	/**
	 * @param int $round
	 * @return void	
	 */
	public static function round(int $round): void
	{
		self::write(self::DELIMITER_SECONDARY);
		self::write('--------------------- ROUND n°'.$round.' ---------------------');
		self::write(self::DELIMITER_SECONDARY);
	}

	/**
	 * @return void
	 */
	public static function stop(): void
	{
		self::write(self::DELIMITER_PRIMARY);
		self::write('============== '.date('H:i:s').' --- GAME ENDED ==============');
		self::write(self::DELIMITER_PRIMARY);
		/* @phpstan-ignore-next-line */
		fclose(self::$log);
		self::$log = false;
	}

}