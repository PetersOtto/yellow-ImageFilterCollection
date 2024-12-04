<?php
// »ImageFilterCollection« is an plugin for ImageFilter.
// »ImageFilterCollection« offers space for your own filters and contains four example filters.
// These examples show how a filter is constructed. Unless absolutely necessary, I will not update »ImageFilterCollection«.
// This way your own filters are safe in »ImageFilterCollection«.
// ImageFilter extension is required. 

class YellowImagefiltercollection
{
    const VERSION = '0.9.1';

    public $yellow;  // access to API

    // Handle initialisation
    public function onLoad($yellow)
    {
        $this->yellow = $yellow;
    }

    // *****************
    // Filter Collection
    // *****************

    // Filter »Beach«
    public function beach($image){
        imagefilter($image, IMG_FILTER_CONTRAST, -20);
        imagefilter($image, IMG_FILTER_COLORIZE, 250, 100, 0, 96);
        return $image;
    }

    // Filter »Beach« with Vignette
    public function beachvi($image){
        imagefilter($image, IMG_FILTER_CONTRAST, -20);
        imagefilter($image, IMG_FILTER_COLORIZE, 250, 100, 0, 96);
        $this->vignette($image, 0.4, 0.7);
        return $image;
    }

    // Filter »Black and White«
    public function bw($image){
        imagefilter($image, IMG_FILTER_CONTRAST, -10);
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        imagefilter($image, IMG_FILTER_COLORIZE, 30, 10, 5, 70);
        return $image;
    }

    // Filter »Black and White«
    public function bwvi($image){
        imagefilter($image, IMG_FILTER_CONTRAST, -10);
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        imagefilter($image, IMG_FILTER_COLORIZE, 30, 10, 5, 70);
        $this->vignette($image, 0.4, 0.7);
        return $image;
    }

    // *****************
    // Helper Collection
    // *****************

    // Desaturation
    function saturation($im, $percentage) /* $percentage to be between 0 and 100 */
    {
        $width  = imagesx($im);
        $height = imagesy($im);     
        $im2  = imagecreatetruecolor($width, $height);
        imagecopy($im2, $im, 0, 0, 0, 0, $width, $height);
        imagefilter($im2, IMG_FILTER_GRAYSCALE);
        imagecopymerge($im, $im2, 0, 0, 0, 0, $width, $height, 100-$percentage);
        imagedestroy($im2);
        return $im;
    }

    // Vignette
    public function effect($x, $y, &$rgb, $sharp, $level){
        global $width, $height;    
            
        $sharp = 0.4; // 0 - 10 small is sharpnes,  
        $level = 0.7; // 0 - 1 small is brighter

        $l = sin(M_PI / $width * $x) * sin(M_PI / $height * $y);
        $l = pow($l, $sharp);
        
        $l = 1 - $level * (1 - $l);
        
        $rgb['red'] *= $l;
        $rgb['green'] *= $l;
        $rgb['blue'] *= $l;
    }

    public function vignette($im, $sharp, $level){
        global $width, $height;    
        $width = imagesx($im);
        $height = imagesy($im);

        for($x = 0; $x < imagesx($im); ++$x){
            for($y = 0; $y < imagesy($im); ++$y){   
                $index = imagecolorat($im, $x, $y);
                $rgb = imagecolorsforindex($im, $index);
                $this->effect($x, $y, $rgb, $sharp, $level);
                $color = imagecolorallocate($im, $rgb['red'], $rgb['green'], $rgb['blue']);

                imagesetpixel($im, $x, $y, $color);   
            }
        }
        return $im;
    }
}
