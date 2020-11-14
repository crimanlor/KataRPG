<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;



class CharacterTest extends TestCase
{

	public function test_Health_starting_at_1000()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getHealth();

		$this->assertEquals(1000, $result);
	}

	public function test_Level_starting_at_1()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getLevel();

		$this->assertEquals(1, $result);
	}

	public function test_starting_Alive()
	{

		$sonGoku = new Character();

		$result = $sonGoku->isAlive();

		$this->assertEquals(true, $result);
	}

	public function test_damage_is_substracted_from_health()
	{
		//given escenario

		$attacker = new Character();
		$damaged = new Character();

		// action

		$attacker->attacks(50, $damaged);

		//then
		$result = $damaged->getHealth();

		$this->assertEquals(950, $result);

		
	}
}
