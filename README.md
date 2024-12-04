# yellow-ImageFilterCollection
»ImageFilterCollection« is an plugin for ImageFilter. »ImageFilterCollection« offers space for your own filters and contains four example filters. These examples show how a filter is constructed. Unless absolutely necessary, I will not update »ImageFilterCollection«. This way your own filters are safe in »ImageFilterCollection«.  
[ImageFilter](https://github.com/PetersOtto/yellow-ImageFilter) is required.

## Filter
This extension currently only contains four filters. These filters can be used, but are actually intended as an aid when developing your own filters. Have a look at the code of the extension, it is quite easy to add new filters.

## Your own filter

The structure is as follows:

```
public function yourFilterName($image){
    
    *** insert the commands here ***
    *** https://www.php.net/manual/de/ref.image.php ***
    
    return $image;
}
```

## Installation
[Download extension](https://github.com/PetersOtto/yellow-ImageFilterCollection/archive/refs/heads/main.zip) and copy zip file into your `system/extensions` folder. Right click if you use Safari.

## How to use
Have a look here: [ImageFilter](https://github.com/PetersOtto/yellow-ImageFilter)

| Class | Filtername |
|---|---|
| imfi-beach | beach filter | 
| imfi-beachvi | beach filter with vignette |
| imfi-bw | black and white filter |
| imfi-bwvi | black and white filter with vignette |

## Examples

| - | - | - |
| --- | --- | --- |
| <img src="01-vintage-rennrad.jpg?raw=true" alt="original image"> | <img src="01-vintage-rennrad-beach.jpg?raw=true" alt="beach filter">  | beach filter | 
| <img src="01-vintage-rennrad.jpg?raw=true" alt="original image"> | <img src="01-vintage-rennrad-beachvi.jpg?raw=true" alt="contrast filter">  | beach filter with vignette |
| <img src="01-vintage-rennrad.jpg?raw=true" alt="original image"> | <img src="01-vintage-rennrad-bw.jpg?raw=true" alt="sharpen filter">  | black and white filter | 
| <img src="01-vintage-rennrad.jpg?raw=true" alt="original image"> | <img src="01-vintage-rennrad-bwvi.jpg?raw=true" alt="contrast filter">  | black and white filter with vignette |


## Developer
PetersOtto. [Get help](https://datenstrom.se/yellow/help/)
