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

    public function getLevel(): int
    {
        return $this->level;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function attacks($damage, $other): int
    {   
        // Daño se quita a la salud
        $other->health -= $damage;

        // Salud es 0 o menos
        if($other->getHealth()<=0)
        {
            // El character muere
            $other->alive = false;
        }
        
        return $other-> getHealth();
    }

}
