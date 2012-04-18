<?php

class Colorful {
  // Ansi Modifiers
  protected static $modifiers = Array(
    'reset'         => 0,
    'bold'          => 1,
    'italic'        => 3,
    'underline'     => 4,
    'blink'         => 5,
    'inverse'       => 7,
    'strikethrough' => 9
  );

  // Ansi foreground colors
  protected static $forecolors = Array(
    'black'    => 30,
    'red'      => 31,
    'green'    => 32,
    'brown'    => 33,
    'blue'     => 34,
    'magenta'  => 35,
    'cyan'     => 36,
    'white'    => 37,
    'normal'   => 39
  );

  // Ansi background colors
  protected static $backcolors = Array(
    'black'    => 40,
    'red'      => 41,
    'green'    => 42,
    'yellow'   => 43,
    'blue'     => 44,
    'magenta'  => 45,
    'cyan'     => 46,
    'white'    => 47,
    'normal'   => 49
  );

  const MODIFIER_SPLITTER = "and";
  const BACKCOLOR_SPLITTER = "on";

  protected static function isModifier($modifier) {
    return array_key_exists($modifier, self::$modifiers);
  }

  protected static function getANSIDecorator($mode) {
    return sprintf("\033[%sm", $mode);
  }

  protected static function translateToANSIDecorator($modetype, $name) {
    if(array_key_exists($name, $modetype)) {
      return self::getANSIDecorator($modetype[$name]);
    } else {
      throw new ANSISequenceNotFoundException("ANSI Sequence `$name` could not be found");
    }
  }

  protected static function parseAttr($attr) {
    $parts = explode("_", $attr);

    $modifiers = "";
    $forecolor = "";
    $backcolor = "";

    do {
      if(self::isModifier($parts[0])) {
        $modifiers .= self::translateToANSIDecorator(self::$modifiers, array_shift($parts));
      }
    } while(isset($parts[0]) && $parts[0] === self::MODIFIER_SPLITTER && array_shift($parts));

    if(in_array(self::BACKCOLOR_SPLITTER, $parts)) {
      $backcolor = self::translateToANSIDecorator(self::$backcolors, $parts[array_search(self::BACKCOLOR_SPLITTER, $parts) + 1]);
      $parts = array_slice($parts, 0, -2);
    }

    if(count($parts) > 0) {
      $forecolor = self::translateToANSIDecorator(self::$forecolors, $parts[0]);
    }

    return $modifiers . $forecolor . $backcolor . "%s" . self::translateToANSIDecorator(self::$modifiers, "reset");
  }

  public static function __callStatic($methodname, $arguments) {
    $text = implode("", $arguments);
    return sprintf(self::parseAttr($methodname), $text);
  }
}
