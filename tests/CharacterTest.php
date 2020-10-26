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

		$attacker->attacks($damaged, 200);

		//then
		$damagedHealth = $damaged->getHealth();

		$this->assertEquals(800, $damagedHealth);
	}

	public function test_When_damage_received_exceeds_Health_becomes_0_and_die()
	{

		$attacker = new Character();
		$damaged = new Character();

		$attacker->attacks($damaged, 1001);

		$damagedHealth = $damaged->getHealth();

		$this->assertEquals(0, $damagedHealth);
		$this->assertEquals(false, $damaged->isAlive());
	}

	public function test_Dead_characters_cannot_be_healed()
	{

		$healer = new Character();
		$dead = new Character();
		$dead->die();

		$healer->heal($dead);
		$deadHealth = $dead->getHealth();
		$deadAlive = $dead->isAlive();

		$this->assertEquals(0, $deadHealth);
		$this->assertEquals(false, $deadAlive);
	}
}
