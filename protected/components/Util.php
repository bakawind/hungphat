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
        $status = @file_get_contents("http://opi.yahoo.com/online?u=$yahooid&m=a&t=1");
        if ($status === '01')
            return true;
		else if ($status === '00')
			return false;
    }
	
	public static function displayMoney($money){
		$moneyString='';			
		$arr = str_split($money, 1);
		$count = 0;		
		
		for($i=count($arr)-1; $i>=0; $i--){
			$moneyString=$arr[$i] . $moneyString;			
			$count+=1;
			if($count%3 == 0 && $i>0){
				$moneyString= '.' . $moneyString;	
				$count=0;
			}				
		}		
		return $moneyString;
	}

    /**
     * $model: CModel that needs to upload file
     * $column: the name of the column to store the uploadedImage url.
     * $dir: the directory's name under /images/uploads dir to save the file.
     */
    public static function uploadPhoto($model, $column='', $dir='') {
        $uploadedFile = CUploadedFile::getInstance($model, $column);
        if ($uploadedFile!=null && $uploadedFile->getSize()!=0 && $column!='') {
            if(isset($model->tmp[$column]) && $model->tmp[$column]!=''){
                Util::deleteImage($model->tmp[$column]);
            }
            $ext = $uploadedFile->getExtensionName();
            $nameOfFile = $uploadedFile->getName();
            $dir = $dir=='' ? '/' : '/'.$dir.'/';
            // Save the file to hard drive
            $uploadedFile->saveAs(Yii::getPathOfAlias('uploadPath') . $dir . $nameOfFile);
            $model->$column = Yii::getPathOfAlias('uploadURL') . $dir . $nameOfFile;
        } else {
            $model->$column = $model->tmp[$column];
        }
        $model->save();
    }

	public static function deleteImage($imageURL, $dir=''){
        if($imageURL!=null){
		    $fileIndex = strrpos($imageURL, "/", -1);
		    $realFilename = substr($imageURL, $fileIndex);
            $dir = $dir=='' ? '/' : '/'.$dir.'/';
            $filePath = Yii::getPathOfAlias('uploadPath') . $dir . $realFilename;

            if(file_exists($filePath))
		        unlink($filePath);
        }
	}
} ?>
