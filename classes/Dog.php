<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.09.2023
 * Time: 12:12
 */

class Dog extends Animal
{
    public function __construct($name, $sound, $can_hunt, $hunting_level)
    {
        $this->name = $name;
        $this->sound = $sound;
        $this->can_hunt = $can_hunt;
        $this->hunting_level = $hunting_level;
    }

    public function make_sound()
    {
        if ($this->sound) {
            return '<p>' . date("Y.m.d H:i:s") . ' - ' . $this->name . ': ' . $this->sound . '</p>';
        } else {
            return '<p>' . date("Y.m.d H:i:s") . ' - Cобака "' . $this->name . '" не може робити звуки.</p>';
        }
    }

    public static function complete_command()
    {
        $dogs = self::all();

        if (isset($_GET["command"])) {
            $entered_command = $_GET["command"];
            $words = $entered_command ? explode(" ", $entered_command) : [];

            if (in_array("sound", $words)) {
                for ($i = 0; $i < $_GET["dogs_count"] && $i < count($dogs); $i++) {
                    echo $dogs[$i]->make_sound();
                }
            }

            if (in_array("hunt", $words) || in_array("hunting", $words)) {
                for ($i = 0; $i < $_GET["dogs_count"] && $i < count($dogs); $i++) {
                    echo $dogs[$i]->hunting();
                }
            }
        }
    }

    public function hunting()
    {
        if ($this->can_hunt) {
            if (!$this->hunting_level) {
                return '<p>' . date("Y.m.d H:i:s") . ' - Cобака "' . $this->name . '" пішла на полювання.</p>';
            } elseif ($this->checkIfNotTooLazyToHunt()) {
                return '<p>' . date("Y.m.d H:i:s") . ' - Cобака "' . $this->name . '" пішла на полювання.</p>';
            } else {
                return '<p>' . date("Y.m.d H:i:s") . ' - Cобака "' . $this->name . '" полює лінь.</p>';
            }
        } else {
            return '<p>' . date("Y.m.d H:i:s") . ' - Cобака "' . $this->name . '" не може полювати.</p>';
        }
    }

    public static function all()
    {
        $dogs = [];
        $dogs[] = new Dog("Cіба-іну", "Гав! Гав!", 1, 0);
        $dogs[] = new Dog("Мопс", "woof! woof!", 1, 70);
        $dogs[] = new Dog("Такса", "Тяв! Тяв!", 1, 30);
        $dogs[] = new Dog("Плюшевий лабрадор", null, 0, 0);
        $dogs[] = new Dog("Гумова такса з пищалкою", "Пііп!! Піі!!", 0, 0);

        return $dogs;
    }
}