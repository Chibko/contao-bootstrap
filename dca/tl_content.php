<?php

/* XBOOTSTRAP */



// Palettes de base modifiées
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addImage'] = str_replace('floating','floating,imgresponsive,lazyCheckbox,cssimage',$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addImage']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['image'] = str_replace('caption;{template_legend:hide}','caption,cssimage,imgresponsive,lazyCheckbox;{template_legend:hide};',$GLOBALS['TL_DCA']['tl_content']['palettes']['image']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['gallery'] = str_replace('metaIgnore;','metaIgnore,lazyCheckbox;',$GLOBALS['TL_DCA']['tl_content']['palettes']['gallery']);

// Palettes pour les colonnes
$GLOBALS['TL_DCA']['tl_content']['palettes']['ligneStart'] = '{type_legend},type,bootstrap_cols_color,colName;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop'; 
$GLOBALS['TL_DCA']['tl_content']['palettes']['colStart'] =
'{type_legend},type,bootstrap_cols,bootstrap_cols_push,bootstrap_cols_offset,bootstrap_cols_pull,bootstrap_cols_color,colName;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['ligneStop'] ='{expert_legend:hide}';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colStop'] ='{expert_legend:hide}';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colSeparator'] ='{type_legend},type,bootstrap_separation,bootstrap_clearfix;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

// Palettes pour Alert
$GLOBALS['TL_DCA']['tl_content']['palettes']['alert'] ='{type_legend},type,{text_legend},text,styleBootstrap;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

// Fiels de base modifié
$GLOBALS['TL_DCA']['tl_content']['fields']['perRow']['options'] = array(1, 2, 3, 4, 6);

// Nouveau Fields pour style Bootstrap
$GLOBALS['TL_DCA']['tl_content']['fields']['styleBootstrap'] = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['styleBootstrap'],
			'default'                 => 'text',
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'select',
			'options'                 => array('default','primary','success','info','warning','danger'),
			'eval'                    => array('chosen'=>true),
			'sql'                     => "varchar(12) NOT NULL default ''"
		);

// Nouveau Fields pour image
$GLOBALS['TL_DCA']['tl_content']['fields']['cssimage'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cssimage'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"

);
$GLOBALS['TL_DCA']['tl_content']['fields']['imgresponsive'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imgresponsive'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['lazyCheckbox'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['lazyCheckbox'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

// Nouveau Fields pour les colonnes
$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_cols'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_cols'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>4, 'tl_class'=>'clr w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_cols_offset'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_cols_offset'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>4, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_cols_push'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_cols_push'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>4, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_cols_pull'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_cols_pull'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>4, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['colName'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_colName'],
            'inputType'               => 'text',
            'save_callback'           => array(array('tl_content_cols', 'setColName')),
	        'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"

);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_cols_color'] = array (
	'label'		=> &$GLOBALS['TL_LANG']['tl_content']['bootstrap_cols_color'],
    'inputType' => 'text',
    'eval'      => array('maxlength'=>6, 'multiple'=>true, size=>1,'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'       => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_cols_parent'] = array (
    'label'		=> &$GLOBALS['TL_LANG']['tl_content']['bootstrap_cols_parent'],
    'sql'       => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_cols_child'] = array (
    'label'		=> &$GLOBALS['TL_LANG']['tl_content']['bootstrap_cols_child'],
    'sql'       => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_clearfix'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_clearfix'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_separation'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_separation'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
            'default'                 => 1,
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
);


// Callbacks
$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback']= array ('tl_content_cols','addCteTypeChibko');
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('tl_content_cols','colsUpdate');
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('tl_content_cols','setElementProperties');
$GLOBALS['TL_DCA']['tl_content']['config']['oncopy_callback'][] = array('tl_content_cols','colsCopy');
$GLOBALS['TL_DCA']['tl_content']['config']['ondelete_callback'][] = array('tl_content_cols','colsDelete');
$GLOBALS['TL_DCA']['tl_content']['fields']['type']['options_callback'] = array('tl_content_cols', 'getContentElements');

class tl_content_cols extends tl_content {
    
    // Redefini getContentElements() pour ne pas afficher les ligneStop et colStop dans les type d'éléments
    public function getContentElements() {
		$groups = array();
		foreach ($GLOBALS['TL_CTE'] as $k=>$v) {
			foreach (array_keys($v) as $kk) {
				if ($kk!="ligneStop" && $kk!="colStop") {
                    $groups[$k][] = $kk;
                }
			}
		}
		return $groups;
	}
    
           
    /**
	 * Autogenerate an name for the colset if it has not been set yet
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function setColName($varValue, DataContainer $dc) {
		$autoName = false;
		
		// Generate alias if there is none
		if (!strlen($varValue))
		{	
			$autoName = true;
			$varValue = 'colset.' . $dc->id;
		}
		return $varValue;
	}
    
    
    /**
	 * Lance la création des colStop et/ou ligneStop si besoin
	 * @param mixed
	 * @return Boolean
	 */
    public function colsUpdate(DataContainer $dc) {
		if($dc->activeRecord->type != 'colStart' && $dc->activeRecord->type != 'ligneStart' || $dc->activeRecord->colName == '')  {
            return '';
        }
        return $this->createColEnd($dc->activeRecord, $dc->activeRecord->bootstrap_cols_child);
	}
       
    
    /**
	 * Créer les colStop et/ou ligneStop
	 * @param object
     * @param integer
	 * @return Boolean
	 */
    public function createColEnd($_colStart, $_child="") {
		
        // Si le colStart n'a pas d'enfant, on le créé
        if ($_child=="") {
            
            $arrChidSet=array();
            $arrChidSet['pid']=$_colStart->pid;
            $arrChidSet['tstamp']=time();
            $arrChidSet['ptable']=$_colStart->ptable;
            $arrChidSet['sorting']=$_colStart->sorting+1;
            $arrChidSet['colName']=$_colStart->colName."-end";
            $type="colStop";
            if ($_colStart->type=="ligneStart") {
                $type="ligneStop";
            } 
            $arrChidSet['type']=$type;	
            $arrChidSet['bootstrap_cols_parent']=$_colStart->id;
            $arrChidSet['bootstrap_cols_color']=$_colStart->bootstrap_cols_color;
		    
            $_child  = \Database::getInstance()->prepare('INSERT tl_content %s')
                    ->set($arrChidSet)
                    ->execute()
                    ->insertId;
        
            $arrSet=array();
            $arrSet['bootstrap_cols_parent']=$_colStart->id;
            $arrSet['bootstrap_cols_child']=$_child;
            
            
            $insertElement = $this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set($arrSet)
											->execute($_colStart->id);
            return true;
        } 
    }
    
    /**
	 * Mets à jours les propriétés pour les colStop et/ou ligneStop
	 * @param object
	 * @return null
	 */
    public function setElementProperties(DataContainer $dc) {
	
		if($dc->activeRecord->type != 'colStart' && $dc->activeRecord->type != 'ligneStart' ) return '';
	    $objEnd = $this->Database->prepare("SELECT id FROM tl_content WHERE colName=?")->execute($dc->activeRecord->colName . '-end');
		$arrSet = array(
			'protected' => $dc->activeRecord->protected,
			'groups' => $dc->activeRecord->groups,
			'guests' => $dc->activeRecord->guests,
            'bootstrap_cols_color' => $dc->activeRecord->bootstrap_cols_color
		);
		$this->Database->prepare("UPDATE tl_content %s WHERE id=?")->set($arrSet)->execute($objEnd->id);
	}
    
    
    
    /**
	 * Supprime les colStop LigneStop en fonction des colStart et ligneStart et inversement
	 * @param object
	 * @return null
	 */
    public function colsDelete(DataContainer $dc) {
        if($dc->activeRecord->type == 'colStart') {
            $deleteObjet = \Database::getInstance()->prepare("DELETE FROM tl_content WHERE bootstrap_cols_parent=? and type='colStop' and pid=?")->execute($dc->activeRecord->bootstrap_cols_parent, $dc->activeRecord->pid);
        }
        
        if($dc->activeRecord->type == 'ligneStart') {
            $deleteObjet = \Database::getInstance()->prepare("DELETE FROM tl_content WHERE bootstrap_cols_parent=? and type='ligneStop' and pid=?")->execute($dc->activeRecord->bootstrap_cols_parent, $dc->activeRecord->pid);
        }
        
        
        if($dc->activeRecord->type == 'colStop') {
            $deleteObjet = \Database::getInstance()->prepare("DELETE FROM tl_content WHERE bootstrap_cols_parent=? and type='colStart' and pid=?")->execute($dc->activeRecord->bootstrap_cols_parent, $dc->activeRecord->pid);
        }
        
        if($dc->activeRecord->type == 'ligneStop') {
            $deleteObjet = \Database::getInstance()->prepare("DELETE FROM tl_content WHERE bootstrap_cols_parent=? and type='ligneStart' and pid=?")->execute($dc->activeRecord->bootstrap_cols_parent, $dc->activeRecord->pid);
        }
    }
    
    
    /**
	 * Copie les colSart et/ou LigneStart avec leur colStop et/ou ligneStop
	 * @param object
     * @param object
	 * @return null
	 */
    public function colsCopy($intId,DataContainer $dc) {
		
        // $intId = Id du nouvel élément copié
        // Récupère le nouvel élement
        $dc->activeRecord = $this->Database->prepare("SELECT * FROM tl_content WHERE id=?")->execute($intId)->first();

        // Si c'est pas un élément colonne, on arrete
        if($dc->activeRecord->type != 'colStart' && $dc->activeRecord->type != 'colStop' && $dc->activeRecord->type != 'ligneStart' && $dc->activeRecord->type != 'ligneStop') {
            return;
        }
        
        // Si c'est une copie simple
		if($this->Input->get('act') == 'copy') {
			
            if($dc->activeRecord->type == 'colStart' || $dc->activeRecord->type == 'ligneStart') {
				// Remet le colName et le bootstrap_cols_child à 0
                $this->Database->prepare("UPDATE tl_content %s WHERE id=?")
							->set(array('colName'=>'','bootstrap_cols_child'=>'','bootstrap_cols_parent'=>''))
							->execute($intId);
			}
            
            if($dc->activeRecord->type == 'colStop' || $dc->activeRecord->type == 'ligneStop') {
				// Remet le colName et le bootstrap_cols_parent à 0
                $this->Database->prepare("UPDATE tl_content %s WHERE id=?")
							->set(array('colName'=>'','bootstrap_cols_parent'=>''))
							->execute($intId);
			}
		}
		
        // Si c'est une copie simple multiple
		if($this->Input->get('act') == 'copyAll') {
			// Stocke le ID d'un nouveau colStart dans $arrSession  
            if($dc->activeRecord->type == 'colStart') {
			    $arrSession = array(
					'parentId' 	=> $intId
			    );
                //$this->Session->set('sc'.$dc->id,$arrSession);
                // ici $dc->id correspond à l'id de l'ancien élément copié
                // permet de récupérer le colStop correspondant au colStart copié
                $GLOBALS['scglobal']['sc'.$dc->id] = $arrSession;
			
                // Met à jour le nouveau colStart avec les nouvelles valeurs
                $arrSet = array(
					'colName'	=> 'colset.' . $intId,
					'bootstrap_cols_parent' => $intId,
                    'bootstrap_cols_child' => ''
			    );
			    $this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set($arrSet)
											->execute($intId);
		    }
			
            if($dc->activeRecord->type == 'ligneStart') {
				$arrSessionLigne = array(
					'parentId' 	=> $intId
				);
				//$this->Session->set('sc'.$dc->id,$arrSession);
                $GLOBALS['scglobal']['scligne'.$dc->id] = $arrSessionLigne;
				// Met à jour le nouveau ligneStart avec les nouvelles valeurs
                $arrSet = array(
					'colName'	=> 'colset.' . $intId,
					'bootstrap_cols_parent' => $intId,
                    'bootstrap_cols_child' => ''
				);
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set($arrSet)
											->execute($intId);
			}
			
			if($dc->activeRecord->type == 'colStop') {
				//$arrSession = $this->Session->get('sc'.$dc->activeRecord->bootstrap_cols_parent);
				$arrSession = $GLOBALS['scglobal']['sc'.$dc->activeRecord->bootstrap_cols_parent];
				$intNewParent = $arrSession['parentId'];
				$arrSet = array(
					'colName'	=> 'colset.' . $intNewParent . '-end',
					'bootstrap_cols_parent' => $intNewParent
				);
				
                // Met à jour le nouveau colStop avec les nouvelles valeurs
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set($arrSet)
											->execute($intId);
				
                // Met à jour le nouveau colStart correspondant avec les nouvelles valeurs
				$arrSet = array(
					'bootstrap_cols_child' => $intId
				);
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set($arrSet)
											->execute($intNewParent);
			}
            
            if($dc->activeRecord->type == 'ligneStop') {
				$arrSessionLigne = $GLOBALS['scglobal']['scligne'.$dc->activeRecord->bootstrap_cols_parent];
				$intNewParent = $arrSessionLigne['parentId'];
				$arrSet = array(
					'colName'	=> 'colset.' . $intNewParent . '-end',
					'bootstrap_cols_parent' => $intNewParent
				);
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set($arrSet)
											->execute($intId);
				$arrSet = array(
					'bootstrap_cols_child' => $intId
				);
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set($arrSet)
											->execute($intNewParent);
			}
		}
	}

   
    public function addCteTypeChibko($arrRow) {
		{
        $key = $arrRow['invisible'] ? 'unpublished' : 'published';
		$type = $GLOBALS['TL_LANG']['CTE'][$arrRow['type']][0] ?: '&nbsp;';
		$class = 'limit_height';
        $styme="";
        $color=deserialize($arrRow[bootstrap_cols_color]);
		// Remove the class if it is a wrapper element
		if (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['start']) || in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['separator']) || in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['stop'])) {
			$class = '';

			if (($group = $this->getContentElementGroup($arrRow['type'])) !== null) {
				$type = $type;
			}
            
            if ($arrRow['type']=="ligneStart") {
				$style="style='padding-left:26px; background-image:url(../system/modules/xBootstrap/assets/images/ico-ligne.png); blackground-position:left top;'";
                $type="<span style='font-size:1.2em; font-weight:bold; color:#".$color[0]."'>".$type."</span> <span style='color:#999';>".$arrRow['colName']."</span>";
			}
            
            if ($arrRow['type']=="colStart") {
				$style="style='padding-left:26px; background-image:url(../system/modules/xBootstrap/assets/images/ico-colonne.png); blackground-position:left top;'";
                $type="<span style='font-size:1.2em; font-weight:bold; color:#".$color[0]."'>".$type."</span> <span style='color:#999';>".$arrRow['colName']."</span>";
			}
            
            if ($arrRow['type']=="colStop") {
				$style="style='padding-left:26px; background-image:url(../system/modules/xBootstrap/assets/images/ico-colonne-end.png); blackground-position:left top;'";
                $type="<span style='font-size:1.2em; font-weight:bold; color:#".$color[0]."'>".$type."</span> <span style='color:#999';>".$arrRow['colName']."</span>";
			}
            
            if ($arrRow['type']=="ligneStop") {
				$style="style='padding-left:26px; background-image:url(../system/modules/xBootstrap/assets/images/ico-ligne-end.png); blackground-position:left top;'";
                $type="<span style='font-size:1.2em; font-weight:bold; color:#".$color[0]."'>".$type."</span> <span style='color:#999';>".$arrRow['colName']."</span>";
			}
		}
        
        
        // Remove the class if it is a wrapper element
		if ($arrRow['type']=='colSeparator') {
			$class = '';
		}
		// Add the group name if it is a single element (see #5814)
		elseif (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['single'])) {
			if (($group = $this->getContentElementGroup($arrRow['type'])) !== null) {
				$type = $GLOBALS['TL_LANG']['CTE'][$group] . ' (' . $type . ')';
			}
		}

		// Add the ID of the aliased element
		if ($arrRow['type'] == 'alias') {
			$type .= ' ID ' . $arrRow['cteAlias'];
		}

		// Add the protection status
		if ($arrRow['protected']) {
			$type .= ' (' . $GLOBALS['TL_LANG']['MSC']['protected'] . ')';
		} elseif ($arrRow['guests']) {
			$type .= ' (' . $GLOBALS['TL_LANG']['MSC']['guests'] . ')';
		}

		// Add the headline level (see #5858)
		if ($arrRow['type'] == 'headline') {
			if (is_array(($headline = deserialize($arrRow['headline'])))) {
				$type .= ' (' . $headline['unit'] . ')';
			}
		}

		// Limit the element's height
		if (!Config::get('doNotCollapse')) {
			$class .=  ' h64';
		}

		$objModel = new ContentModel();
		$objModel->setRow($arrRow);

		return '
<div class="cte_type ' . $key . '" '.$style.'>' . $type . '</div>
<div class="' . trim($class) . '">
' . StringUtil::insertTagToSrc($this->getContentElement($objModel)) . '
</div>' . "\n";
	}
    }    
}

