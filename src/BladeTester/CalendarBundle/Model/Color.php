<?php

namespace BladeTester\CalendarBundle\Model;

class Color {

    const BLACK = 'black';
    const RED = 'red';
    const GREEN = 'green';
    const BLUE = 'blue';
    const YELLOW = 'yellow';
    const CYAN = 'cyan';
    const MAGENTA = 'magenta';
    const GRAY = 'gray';
    const WHITE = 'white';

    public static function getAll() {
        return array(
            self::BLACK,
            self::RED,
            self::GREEN,
            self::BLUE,
            self::YELLOW,
            self::CYAN,
            self::MAGENTA,
            self::GRAY,
            self::WHITE,
            );
    }
}
