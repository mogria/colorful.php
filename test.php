#!/usr/bin/env php
<?php

include 'Colorful.php';

print(cf::bold_red_on_black("dfgdfg") . "\n");
print(cf::black_on_white("Hello World!") . "\n");
print(cf::underline("Hello World!") . "\n");
print(cf::bold_and_underline_green("Hello World!") . "\n");
print(cf::bold_and_underline_green_on_red("Hello World!") . "\n");
print(Colorful::bold_and_underline_and_strikethrough_green_on_red("Hello World!") . "\n");
print(cf::strikethrough("dfgsfdg") . "\n");
cf_out::bold_red_on_black("dfgdfg");
