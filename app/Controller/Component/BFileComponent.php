<?php
class BFileComponent extends Component {

	public $components = array(
		'Session',
	);


	/*
	 * @param $cType - the conversion type: resize (default), resizeCrop (square), crop (from center) 
	 * @param $id - image filename
	 * @param $imgFolder  - the folder where the image is
	 * @param $newName - include extension (if desired)
	 * @param $newWidth - the  max width or crop width
	 * @param $newHeight - the max height or crop height
	 * @param $quality - the quality of the image
	 * @param $bgcolor - this was from a previous option that was removed, but required for backward compatibility
	 */
	
	function resizeImage($cType = 'resize', $id, $imgFolder, $newName = false, $newWidth=false, $newHeight=false, $quality = 75, $bgcolor = false)
	{
		$img = $imgFolder . $id;
		list($oldWidth, $oldHeight, $type) = getimagesize($img); 
		$ext = $this->image_type_to_extension($type);
		
		//check to make sure that the file is writeable, if so, create destination image (temp image)
		if (is_writeable($imgFolder))
		{
			if($newName){
				$dest = $imgFolder . $newName;
			} else {
				$dest = $imgFolder . 'tmp_'.$id;
			}
		}
		else
		{
			//if not let developer know
			$imgFolder = substr($imgFolder, 0, strlen($imgFolder) -1);
			$imgFolder = substr($imgFolder, strrpos($imgFolder, '\\') + 1, 20);
			debug("You must allow proper permissions for image processing. And the folder has to be writable.");
			debug("Run \"chmod 777 on '$imgFolder' folder\"");
			exit();
		}
		
		//check to make sure that something is requested, otherwise there is nothing to resize.
		//although, could create option for quality only
		if ($newWidth OR $newHeight)
		{
			/*
			 * check to make sure temp file doesn't exist from a mistake or system hang up.
			 * If so delete.
			 */
			if(file_exists($dest))
			{
				unlink($dest);
			}
			else
			{
				switch ($cType){
					default:
					case 'resize':
						# Maintains the aspect ration of the image and makes sure that it fits
						# within the maxW(newWidth) and maxH(newHeight) (thus some side will be smaller)
						$widthScale = 2;
						$heightScale = 2;
						if($newWidth) {
							if($newWidth > $oldWidth) {
								$newWidth = $oldWidth;
								$widthScale =  $newWidth / $oldWidth;
							}
						}
						if($newHeight) {
							if($newHeight > $oldHeight){
								$newHeight = $oldHeight;
								$heightScale = $newHeight / $oldHeight;
							}
						}
						//debug("W: $widthScale  H: $heightScale<br>");
						if($widthScale < $heightScale) {
							$maxWidth = $newWidth;
							$maxHeight = false;							
						} elseif ($widthScale > $heightScale ) {
							$maxHeight = $newHeight;
							$maxWidth = false;
						} else {
							$maxHeight = $newHeight;
							$maxWidth = $newWidth;
						}
						
						if($maxWidth > $maxHeight){
							$applyWidth = $maxWidth;
							$applyHeight = ($oldHeight*$applyWidth)/$oldWidth;
						} elseif ($maxHeight > $maxWidth) {
							$applyHeight = $maxHeight;
							$applyWidth = ($applyHeight*$oldWidth)/$oldHeight;
						} else {
							$applyWidth = $maxWidth; 
								$applyHeight = $maxHeight;
						}
						//debug("mW: $maxWidth mH: $maxHeight<br>");
						//debug("aW: $applyWidth aH: $applyHeight<br>");
						$startX = 0;
						$startY = 0;
						//exit();
						break;
					case 'resizeCrop':
						// -- resize to max, then crop to center
						$ratioX = $newWidth / $oldWidth;
						$ratioY = $newHeight / $oldHeight;
						
						if($newWidth > $oldWidth) $newWidth = $oldWidth;  $ratioX = $newWidth / $oldWidth;        
						if($newHeight > $oldHeight) $newHeight = $oldHeight; $ratioY = $newHeight / $oldHeight; 
	
						if ($ratioX < $ratioY) { 
							$startX = round(($oldWidth - ($newWidth / $ratioY))/2);
							$startY = 0;
							$oldWidth = round($newWidth / $ratioY);
							$oldHeight = $oldHeight;
						} else { 
							$startX = 0;
							$startY = round(($oldHeight - ($newHeight / $ratioX))/2);
							$oldWidth = $oldWidth;
							$oldHeight = round($newHeight / $ratioX);
						}
						$applyWidth = $newWidth;
						$applyHeight = $newHeight;
						break;
					case 'crop':
						// -- a straight centered crop
						$startY = ($oldHeight - $newHeight)/2;
						$startX = ($oldWidth - $newWidth)/2;
						$oldHeight = $newHeight;
						$applyHeight = $newHeight;
						$oldWidth = $newWidth; 
						$applyWidth = $newWidth;
						break;
				}
				
				switch($ext)
				{
					case 'gif' :
						$oldImage = imagecreatefromgif($img);
						break;
					case 'png' :
						$oldImage = imagecreatefrompng($img);
						break;
					case 'jpg' :
					case 'jpeg' :
						$oldImage = imagecreatefromjpeg($img);
						break;
					default :
						//image type is not a possible option
						return false;
						break;
				}
				
				//create new image
				$newImage = imagecreatetruecolor($applyWidth, $applyHeight);
				
				if($bgcolor):
				//set up background color for new image
					sscanf($bgcolor, "%2x%2x%2x", $red, $green, $blue);
					$newColor = ImageColorAllocate($newImage, $red, $green, $blue); 
					imagefill($newImage,0,0,$newColor);
				endif;
				
				//put old image on top of new image
				imagecopyresampled($newImage, $oldImage, 0,0 , $startX, $startY, $applyWidth, $applyHeight, $oldWidth, $oldHeight);
				
					switch($ext)
					{
						case 'gif' :
							imagegif($newImage, $dest, $quality);
							break;
						case 'png' :
						    imagepng($newImage, $dest, round(($quality / 10) - 1));
							break;
						case 'jpg' :
						case 'jpeg' :
							imagejpeg($newImage, $dest, $quality);
							break;
						default :
							return false;
							break;
					}
				
				imagedestroy($newImage);
				imagedestroy($oldImage);
				
				if(!$newName){
					unlink($img);
					rename($dest, $img);
				}
				
				return true;
			}

		} else {
			return false;
		}
		

	}

	function image_type_to_extension($imagetype)
	{
	if(empty($imagetype)) return false;
		switch($imagetype)
		{
			case IMAGETYPE_GIF    : return 'gif';
			case IMAGETYPE_JPEG    : return 'jpg';
			case IMAGETYPE_PNG    : return 'png';
			case IMAGETYPE_SWF    : return 'swf';
			case IMAGETYPE_PSD    : return 'psd';
			case IMAGETYPE_BMP    : return 'bmp';
			case IMAGETYPE_TIFF_II : return 'tiff';
			case IMAGETYPE_TIFF_MM : return 'tiff';
			case IMAGETYPE_JPC    : return 'jpc';
			case IMAGETYPE_JP2    : return 'jp2';
			case IMAGETYPE_JPX    : return 'jpf';
			case IMAGETYPE_JB2    : return 'jb2';
			case IMAGETYPE_SWC    : return 'swc';
			case IMAGETYPE_IFF    : return 'aiff';
			case IMAGETYPE_WBMP    : return 'wbmp';
			case IMAGETYPE_XBM    : return 'xbm';
			default                : return false;
		}
	}

    /**
     * 保持网络图片到本地服务器
     *
     */
    public function grabImage($url, $filename=""){
        //$url 为空则返回 false;
        if($url == "") {
            return false;
        }
        $ext = strrchr($url, ".");//得到图片的扩展名

        if($ext != ".gif" && $ext != ".jpg" && $ext != ".bmp" && $ext != ".png"){
            return false;
        }

        if($filename == ""){
            $filename = md5(time())."$ext";
        }//以时间戳另起名

        if( $this->Session->check('id') ){
            $user_id = $this->Session->read('id');
        }else{
            $user_id = 1;
        }

        $upload_path = UPLOAD_PATH . $user_id . DS . 'default' . DS;
 
        if(!file_exists(UPLOAD_PATH . $user_id)){
            mkdir(UPLOAD_PATH.$user_id);
        }

        if(!file_exists($upload_path)){
            mkdir($upload_path);
        }


        file_put_contents($upload_path.$filename, file_get_contents($url));
		
		$this->resizeImage('resizeCrop', $filename, $upload_path, '120x120_'.$filename, 120, 120, 100);
        $this->resizeImage('resizeCrop', $filename, $upload_path, '240x180_'.$filename, 240, 180, 100);

        return  UPLOAD_VIEW_PATH . $user_id .'/default/' . $filename;
   }

}
?>
