# colorful.php
This tiny PHP Library provides a class to decorate text with ANSI terminal colors and modifiers. It's a PHP implementation of [this project](https://github.com/timofurrer/colorful) .

***

**Author:** Mogria <m0gr14@gmail.com> (Thanks to Timo Furrer for the awesome python module)<br />
**License:** GPLv3 (See `LICENSE`)

# dafuq?

With this Library you can decorate some text with colors and other awesome stuff.

For example:

    print(cf::bold_red_on_black("dfgdfg"));
    print(cf::black_on_white("Hello World!"));
    print(cf::underline("Hello World!"));
    print(cf::bold_and_underline_green("Hello World!"));
    print(cf::bold_and_underline_green_on_red("Hello World!"));
    print(cf::bold_and_underline_and_strikethrough_green_on_red("Hello World!"));
    print(cf::strikethrough("dfgsfdg"));

Or if you want to output it directly:

    cf_out::bold_red_on_black("dfgdfg");
    cf_out::black_on_white("Hello World!");
    cf_out::underline("Hello World!");
    ...

## Available modifiers and colors

### Modifiers:
 * reset<br />
 * bold<br />
 * italic<br />
 * underline<br />
 * blink<br />
 * inverse<br />
 * strikethrough<br />

### Forecolors:
 * black<br />
 * red<br />
 * green<br />
 * brown<br />
 * blue<br />
 * magenta<br />
 * cyan<br />
 * white<br />
 * normal<br />

### Backcolors:
 * black<br />
 * red<br />
 * green<br />
 * yellow<br />
 * blue<br />
 * magenta<br />
 * cyan<br />
 * white<br />
 * normal<br />
