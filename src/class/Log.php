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
	 * @var resource|false $log
	 */
	private static $log;

	public static function start(): void
	{
		self::$log = fopen(self::FILE, self::MODE);
	} 

	/**
	 * @param string $message
	 * @return void
	 */
	public static function write(string $message): void
	{
		if (!self::$log) throw new Exception('Log feature is not available');
		fwrite(self::$log, $message . PHP_EOL);
	}

	public static function stop(): void
	{
		/* @phpstan-ignore-next-line */
		fclose(self::$log);
		self::$log = false;
	}

}