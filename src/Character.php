<?php

namespace App;

class Character
{
    private int $health;
    private int $level;
    private bool $alive;

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function die(): void
    {
        $this->setHealth(0);
        $this->alive = false;
    }

    public function attacks(Character $damaged, int $amount): void
    {
        if ($amount > $damaged->getHealth()) {

            $damaged->die();
            return;
        }
        $damaged->setHealth($damaged->getHealth() - $amount);
    }

    public function heal(Character $healed, int $ammount): void
    {
        if (!$healed->isAlive()) {
            return;
        }

        if ($ammount + $healed->getHealth() > 1000) {
            $healed->setHealth(1000);
            return;
        }

        $healed->setHealth($healed->getHealth() + $ammount);
    }
}
