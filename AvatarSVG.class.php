<?php
class AvatarSVG {
	protected $width, $height;
	protected $file;
	function __construct($width, $height, $seedString = NULL){
		$this->width = (int) $width;
		$this->height = (int) $height;
		if($seedString == NULL){
			$seedString = rand();
		}
		$hash = md5($seedString);
		$color_1 =	"#".substr($hash, 0, 6);
		$color_2 = "#".substr($hash, 6, 6);
		$color_3 = "#".substr($hash, 12, 6);
		$color_4 = "#".substr($hash, 18, 6);
		
		$this->file = '<?xml version="1.0" encoding="utf-8"?>
		<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
		<svg width="'.$width.'px" height="'.$height.'px" xml:lang="fr" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<line x1="0" y1="'.(round($height/4)*1).'" x2="'.(round($width/4)*1).'" y2="0" style="stroke:'.$color_1.';stroke-width:'.round($width/4).'px;" />
			<line x1="0" y1="'.(round($height/4)*2).'" x2="'.(round($width/4)*2).'" y2="0" style="stroke:'.$color_2.';stroke-width:'.round($width/4).'px;" />
			<line x1="0" y1="'.(round($height/4)*3).'" x2="'.(round($width/4)*3).'" y2="0" style="stroke:'.$color_3.';stroke-width:'.round($width/4).'px;" />
			<line x1="'.$width.'" y1="'.(round($height/4)*3).'" x2="'.(round($width/4)*3).'" y2="'.$height.'" style="stroke:'.$color_1.';stroke-width:'.round($width/4).'px;" />
			<line x1="'.$width.'" y1="'.(round($height/4)*2).'" x2="'.(round($width/4)*2).'" y2="'.$height.'" style="stroke:'.$color_2.';stroke-width:'.round($width/4).'px;" />
			<line x1="'.$width.'" y1="'.(round($height/4)*1).'" x2="'.(round($width/4)*1).'" y2="'.$height.'" style="stroke:'.$color_3.';stroke-width:'.round($width/4).'px;" />
			<line x1="0" y1="'.$height.'" x2="'.$width.'" y2="0" style="stroke:'.$color_4.';stroke-width:'.round($width/4).'px;" />
		</svg>';
	}
	function read(){
		ob_clean();
		header('Content-Type: image/svg+xml');
		echo $this->file;
		return true;
	}
	function save($fileName){
		if(!(file_exists($fileName))){
			file_put_contents($fileName, $this->file)
			return true;
		}
		else {
			return false;
		}
	}
}