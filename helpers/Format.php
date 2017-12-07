<?php
/**
*  Format Class
*/
class Format
{
	
	public function DateFormat($date)
	{
         return date("F j,Y  g:i a",strtotime($date));
	}
	public function textExerpt($text,$limit=400)
	{
        $text = $text." ";
        $text = substr($text,0,$limit);
        $text = substr($text,0,strrpos($text," "));
        $text = $text."....";
        return $text;
	}
	public function validation($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}
	public function fortitle(){
		$path = $_SERVER['SCRIPT_NAME'];
		$title = basename($path,'.php');
		if($title=="index"){
			$title = 'home';
		}elseif($title=="contact"){
			$title ="contact";
		}
		$title = ucwords($title);
		return $title;
	}
}









?>