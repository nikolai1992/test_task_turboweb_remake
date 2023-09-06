<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.09.2023
 * Time: 16:03
 */

abstract class Animal
{
    protected $name;
    protected $sound;
    protected $can_hunt;
    protected $hunting_level = 0;

    public function getHuntingLevel()
    {
        return $this->hunting_level;
    }

    function checkIfNotTooLazyToHunt()
    {
        return rand(0, 100) > $this->hunting_level;
    }

    abstract public function make_sound();

    abstract public function hunting();
}