<?php

$GLOBALS['TL_DCA']['tl_article']['fields']['space']['eval']['rgxp']='alnum';
$GLOBALS['TL_DCA']['tl_article']['config']['oncopy_callback'][] = array('colsCallback','articleCheck');

class colsCallback extends tl_article {
	public function pageCheck($intId=0) {
		if($intId==0) return '';
		
		if(!$this->Input->get('childs')) {
			$objArticle = $this->Database->prepare("SELECT id FROM tl_article WHERE pid=?")
										 ->execute($intId);
			if($objArticle->numRows > 0) {
				while($objArticle->next()) {
					$this->copyCheck($objArticle->id);
				}
			}
		}
		else if($this->Input->get('childs') == 1) {
			$arrPages = $this->getChildRecords($intId,'tl_page');
			
			foreach($arrPages as $id) {
				$objArticle = $this->Database->prepare("SELECT id FROM tl_article WHERE pid=?")
										 ->execute($id);
				
				if($objArticle->numRows > 0) {
					while($objArticle->next()) {
						$this->copyCheck($objArticle->id);
					}
				}
			}
			
		}
	}

	public function articleCheck($intId=0) {
		if($intId==0) return '';
		$this->copyCheck($intId);
		
	}
	
	/**
     * 
     * HOOK: $GLOBALS['TL_HOOKS']['clipboardCopyAll']
     * 
     * @param array $arrIds
     */
    public function clipboardCopyAll($arrIds) {
        $arrIds = array_keys(array_flip($arrIds));
		
		$objDb = $this->Database->execute("SELECT DISTINCT pid FROM tl_content WHERE id IN (".implode(',',$arrIds).")");
		
		if($objDb->numRows > 0) {
			while($objDb->next())
			{
				$this->copyCheck($objDb->pid);
			}
		}
		
    }
	
	
	/**
     * Copy a colset
     * 
     * @param integer $pid
     */
	public function copyCheck($pid) {
			
		$objColstarts = $this->Database->prepare("SELECT id,type,bootstrap_cols_child,bootstrap_cols_parent FROM tl_content WHERE pid=? AND type=? ORDER BY sorting")
												->execute($pid,'colStart');
                                                
		$objLignestarts = $this->Database->prepare("SELECT id,type,bootstrap_cols_child,bootstrap_cols_parent FROM tl_content WHERE pid=? AND type=? ORDER BY sorting")
												->execute($pid,'ligneStart');
		
        if($objLignestarts->numRows > 0) {
			$parent = 0;
			$child = "";
			$parent = "";
            
			while($objLignestarts->next()) {
				$colName = 'colset.' . $objLignestarts->id;
				$bootstrap_cols_parent = $objLignestarts->id;
                $oldParent = $objLignestarts->bootstrap_cols_parent;
                $newChild = $this->Database->prepare("SELECT id FROM tl_content WHERE bootstrap_cols_parent=? and pid=? and type='ligneStop'")
											    ->limit(1)
												->execute($oldParent,$pid);
				
                //Met à jour le ligneStop
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set(array(
                                            'bootstrap_cols_parent'=>$objLignestarts->id,
                                            'colName'=>$colName.'-end'
                                            ))
											->execute($newChild->id);
                                            
                //Met à jour le ligneStart
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set(array(
                                            'bootstrap_cols_parent'=>$objLignestarts->id,
                                            'bootstrap_cols_child'=>$newChild->id,
                                            'colName'=>$colName 
                                            ))
											->execute($objLignestarts->id);
		    }
	    }
    
        if($objColstarts->numRows > 0) {
			$parent = 0;
			$child = "";
			$parent = "";
            
			while($objColstarts->next()) {
				$colName = 'colset.' . $objColstarts->id;
				$bootstrap_cols_parent = $objColstarts->id;
                $oldParent = $objColstarts->bootstrap_cols_parent;
                $newChild = $this->Database->prepare("SELECT id FROM tl_content WHERE bootstrap_cols_parent=? and pid=? and type='colStop'")
											    ->limit(1)
												->execute($oldParent,$pid);
                //Met à jour le colStop
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set(array(
                                            'bootstrap_cols_parent'=>$objColstarts->id,
                                            'colName'=>$colName.'-end'
                                            ))
											->execute($newChild->id);
                //Met à jour le colStart
				$this->Database->prepare("UPDATE tl_content %s WHERE id=?")
											->set(array(
                                            'bootstrap_cols_parent'=>$objColstarts->id,
                                            'bootstrap_cols_child'=>$newChild->id,
                                            'colName'=>$colName 
                                            ))
											->execute($objColstarts->id);
		    }
	    }
    }
}
