<?php

namespace Furqat\LaravelAvatar;

abstract class Avatar
{
    protected $str = '';
    protected $minimized_str;
    protected $size;
    protected $background_color;
    protected $font_color;
    protected $font_family;

    //constants
    const DEFAULT_STR = '?';

    abstract public function __construct(string $str);

    /**
     * Generate an avatar image from a string.
     * @return string
     */
    abstract public function generate(): string;

    /**
     * returning of first two letters of the given string
     * if string is shorter than two letters, returned first two letters
     * if string is longer than two letters, returned first letters of first two words
     * @return string
     */
    abstract protected function minimize(): string;

    /**
     * Get color
     * @noreturn
     */
    abstract public function color($color): void;

    /**
     * Get background color
     * @noreturn
     */
    abstract public function backgroundColor($color): void;

    /**
     * Get font color
     * @noreturn
     */
    abstract public function fontFamily($font): void;

    /**
     * Get size
     * @noreturn
     */
    abstract public function size(int $size): void;

    /**
     * Validate string for generating an avatar
     * @param string $str
     *
     * @return bool
     * @throws \Exception
     */
    public function validate($str): bool
    {
        if (is_string($str)) {
            return strlen($str) > 0;
        } else {
            return throw new \Exception('String must be a string');
        }
    }

    protected function generateSVG(): string
    {
        //set default values and calculate sizes

        $size = $this->size ?? config('avatar.size');
        $background_color = $this->background_color ?? config('avatar.background_color');
        $font_color = $this->font_color ?? config('avatar.font_color');
        $font_size = floor(($size ?? config('avatar.font_size')) / 2);
        $font_family = $this->font_family ?? config('avatar.font_family');
        $circle_center_x = $circle_center_y = $circle_radius = floor($size / 2);
        $minimized_str = $this->minimized_str;

        //generate svg

        return <<<EOT
 <svg xmlns="http://www.w3.org/2000/svg" width="$size" height="$size">
	<circle style="fill: $background_color;" cx="$circle_center_x" cy="$circle_center_y" r="$circle_radius"></circle><text
		style="font-family: $font_family;" x="50%" y="50%" alignment-baseline="middle" text-anchor="middle"
		dominant-baseline="middle" font-size="$font_size" dy=".1em" fill="$font_color">$minimized_str</text>
</svg>
EOT;
    }

}
