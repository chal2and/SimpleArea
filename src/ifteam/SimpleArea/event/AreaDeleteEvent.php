<?php

namespace ifteam\SimpleArea\event;

use pocketmine\event\Event;
use pocketmine\event\Cancellable;
use ifteam\SimpleArea\database\area\AreaProvider;
use pocketmine\level\Level;
use ifteam\SimpleArea\database\area\AreaSection;

class AreaDeleteEvent extends Event implements Cancellable {
	public static $handlerList = null;
	public static $eventPool = [ ];
	public static $nextEvent = 0;
	protected $player, $level, $id, $resident;
	/**
	 * __construct()
	 *
	 * @param string $player        	
	 * @param string $level        	
	 * @param string $id        	
	 * @param array $resident        	
	 */
	public function __construct($player, $level, $id, $resident) {
		$this->player = $player;
		$this->level = $level;
		$this->id = $id;
		$this->resident = $resident;
	}
	/**
	 * getPlayer()
	 *
	 * @return string
	 */
	public function getPlayer() {
		return $this->player;
	}
	/**
	 * getLevel()
	 *
	 * @return string
	 */
	public function getLevel() {
		return $this->level;
	}
	/**
	 * getAreaId()
	 *
	 * @return string $id
	 */
	public function getAreaId() {
		return $this->id;
	}
	/**
	 * getResident()
	 *
	 * @return array $resident
	 */
	public function getResident() {
		return $this->resident;
	}
	/**
	 * getAreaData()
	 *
	 * @return AreaSection $area
	 */
	public function getAreaData() {
		return AreaProvider::getInstance ()->getAreaToId ( $this->level, $this->id );
	}
}
?>