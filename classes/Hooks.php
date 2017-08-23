<?php

namespace xbootstrap;

class Hooks {

	public function myGeneratePage($objPage, $objLayout, $objPageRegular) {
		if ($objLayout->bootstrap) {
				$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/xBootstrap/assets/js/bootstrap.min.js|static';
				$GLOBALS['TL_CSS'][] = 'system/modules/xBootstrap/assets/css/bootstrap.min.css|static';
		}
		$strDefersTags = '[[TL_DEFERS]]';
		if (($strDefers = trim($objLayout->javascript)) != false) {
				$strDefersTags .= $strDefers . "\n";
		}
		$objPageRegular->Template->javascript = $strDefersTags;
	}
    
    
    public function pictureDefault($objTemplate)
	{
        // Si c'est pas une image
        if ('picture_default' != $objTemplate->getName()) { return; }

		// récupère les données de l'image
        $arrData = $objTemplate->getData();
        // No images to render
		if (empty($arrData['img'])) { return; }
        
        // Check if is LazyLoader disabled
		if ($arrData['lazy']) { 
            // Récupère path de l'image   
            $sourceImg=$arrData['img'];
            // Récupère l'image pour le reponsive la plus grande    
            $arrSource=$arrData["sources"][0];
            // Si l'image pour le responsive existe, on prend celle-là comme base
            if(is_array($arrSource)) {
                $sourceImg= $arrSource;  
            }
            $test=str_replace(TL_FILES_URL,'',$sourceImg['src']);
            //print_r($sourceImg);
            /*$imageFile=new \File($sourceImg['src'],true);
            $imageObj = new \Image($imageFile);
 
            $placeholderImagePath = $imageObj->setTargetWidth($sourceImg['width']/2)
                      ->setTargetHeight($sourceImg['height']/2)
                      ->setResizeMode('center_center')
                      ->executeResize()
                      ->getResizedPath();*/
            
            $placeholderImagePath = \Image::get($test, $sourceImg['width']/2, $sourceImg['height']/2,'center center', null, true);
            
            // New template arrData
            $arrData['img']['placeholder'] = array($placeholderImagePath,$sourceImg['width'],$sourceImg['height']);;

        }
        
        $objTemplate->setData($arrData);
        return;
		
	}

    
    // Génère le nom pour l'image placeholder
    private function getPlaceholderName($fileObj)
	{
		$strCacheKey = substr(md5
		(
			  '-w' . $fileObj->width
			. '-h' . $fileObj->height
			. '-o' . $fileObj->filename
		), 0, 8);

		return 'assets/images/' . substr($strCacheKey, -1) . '/blur-' . $fileObj->filename . '-' . $strCacheKey . '.' . $fileObj->extension;
	}
}
