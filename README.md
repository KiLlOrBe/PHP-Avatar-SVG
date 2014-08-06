PHP AvatarSVG
=============
AvatarSVG is a very simple PHP class for generating images using the SVG format.

Usages
======
```php
$avatar = new AvatarSVG($width, $height, $seed);
```
* $width: The width in pixel of the image
* $height: The height in pixel of the image
* $seed: The seed of generation of the image, if the parameter is not specified the image will be randomly generated.

```php
$avatar->read();
```
Output the SVG code in the buffer.

```php
$avatar->save($fileName);
```
Save the SVG code in the file $fileName. If the file already exist will return false.
