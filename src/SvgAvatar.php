<?php

namespace Furqat\LaravelAvatar;

class SvgAvatar extends Avatar
{

    /**
     * @throws \Exception
     */
    public function __construct($str)
    {
        $this->str = ($this->validate($str)) ? $str : self::DEFAULT_STR;
        $this->minimized_str = $this->minimize($str);
    }

    public function generate(): string
    {
       return $this->generateSVG();
    }

    protected function minimize(): string
    {
        $exploded = explode(' ', $this->str);
        return (count($exploded) > 1) ? strtoupper(substr($exploded[0], 0, 1) . substr($exploded[1], 0, 1))
            : strtoupper(substr($this->str, 0, 2));
    }


    public function color($color): void
    {
        $this->font_color = $color;
    }


    public function backgroundColor($color): void
    {
        $this->background_color = $color;
    }

    public function fontFamily($font): void
    {
        $this->font_family = $font;
    }

    public function size($size): void
    {
        $this->size = $size;
    }
}
