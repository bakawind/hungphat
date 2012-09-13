<?php
class Util{
  public static function limitWord($string, $limit, $suffix = "...") {
      //remove images out of the content
      $pattern = '/<img.*\/\>/';
      $string = preg_replace($pattern, '', $string);

    $lines = wordwrap($string, $limit, "<br/>");
    $arr = explode("<br/>", $lines);
    if (sizeof($arr) > 1) {
      return $arr[0] . " " . $suffix;
    } else {
      return $string;
    }
  }

  public static function formatDate($postgresDate, $format='d-m-Y') {
    $date = new DateTime(trim($postgresDate));
    return $date->format($format);
  }

  public static function formatSlug($title){
        //$title = strtolower($title);
        $title = str_replace(' ','-',$title);
        return $title;
  }
  
  public static function getYahooStatus($yahooid){
	$status = file_get_contents("http://opi.yahoo.com/online?u=$yahooid&m=a&t=1");
	if ($status === '00')
		return false;
    elseif ($status === '01')
        return true;
  }
}

?>
