<?php

namespace App;

class Character
{
    const MAX_HEALTH = 1000;
    const MIN_HEALTH = 0;
    private int $health;
    private int $level;
    private bool $alive;

    function __construct()
    {
        $this->health = self::MAX_HEALTH;
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
        $this->setHealth(self::MIN_HEALTH);
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

    public function heal(Character $healed, int $amount): void
    {
        if (!$healed->isAlive()) {
            return;
        }

        if ($amount + $healed->getHealth() > self::MAX_HEALTH) {
            $healed->setHealth(self::MAX_HEALTH);
            return;
        }

        $healed->setHealth($healed->getHealth() + $amount);
    }
}
