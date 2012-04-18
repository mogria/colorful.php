<?php

class cf extends Colorful { }

class cf_out extends Colorful {
  public static function __callStatic($methodname, $arguments) {
    echo parent::__callStatic($methodname, $arguments);
  }
}
