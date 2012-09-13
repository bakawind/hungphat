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
        //$status = @file_get_contents("http://opi.yahoo.com/online?u=$yahooid&m=a&t=1");
        //if ($status === '01')
        //    return true;
        return false;
    }

    /**
     * $model: CModel that needs to upload file
     * $column: the name of the column to store the uploadedImage url.
     * $dir: the directory's name under /images/uploads dir to save the file.
     */
    public static function uploadPhoto($model, $column='', $dir='') {
        $uploadedFile = CUploadedFile::getInstance($model, $column);
        if ($uploadedFile!=null && $uploadedFile->getSize()!=0 && $column!='') {
            if($model->tmp!='' || $model->tmp!=null){
                Util::deleteImage($model->tmp);
            }
            $ext = $uploadedFile->getExtensionName();
            $nameOfFile = $uploadedFile->getName();
            $dir = $dir=='' ? '/' : '/'.$dir.'/';
            // Save the file to hard drive
            $uploadedFile->saveAs(Yii::getPathOfAlias('uploadPath') . $dir . $nameOfFile);
            $model->$column = Yii::getPathOfAlias('uploadURL') . $dir . $nameOfFile;

            //Yii::import('application.extensions.images.Image');
            //$image = new Image($model->getPath());
            //$image = Yii::app()->image->load($model->getPath());
            //Crunch the photo to a size set in my System Options Table
            //I hold the max size as 800 meaning to fit in an 800px x 800px square
            //$size=$this->getOption('PhotoLarge');
            //$image->resize($size[0], $size[0])->quality(75)->sharpen(20);
            //$image->save();
            // Now create a thumb - again the thumb size is held in System Options Table
            //$size=$this->getOption('PhotoThumb');
            //$image->resize($size[0], $size[0])->quality(75)->sharpen(20);
            //$image->save($model->getThumb()); // or $image->save('images/small.jpg');
        } else {
            $model->$column = $model->tmp;
        }
        $model->save();
    }

	public static function deleteImage($imageURL){
		$fileIndex = strrpos($imageURL, "/", -1);
		$realFilename = substr($imageURL, $fileIndex);
        $filePath = Yii::getPathOfAlias('uploadPath') . "\\products\\" . $realFilename;

        if(file_exists($filePath))
		    unlink($filePath);
	}
} ?>
