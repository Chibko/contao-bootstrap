<?php
/*Coupe le tableau $GLOBALS['TL_CTE'] pour mettre les colonnes en 2e position */
$tab1=array_slice($GLOBALS['TL_CTE'], 0, 1);
$tab2=array_slice($GLOBALS['TL_CTE'],1);

$GLOBALS['TL_CTE']=$tab1;    
$GLOBALS['TL_CTE']['cols'] = array
	(
		'ligneStart' => 'ContentLigneStart',
		'ligneStop' => 'ContentLigneStop',
        'colStart' => 'ContentColStart',
		'colStop' => 'ContentColStop',
		'colSeparator' => 'ContentColSeparator',
	);

$GLOBALS['TL_CTE']=array_merge($GLOBALS['TL_CTE'],$tab2);
$GLOBALS['TL_CTE']['texts']['alert']='ContentAlert';

// WRAPPER
$GLOBALS['TL_WRAPPERS']['start'][]='ligneStart';
$GLOBALS['TL_WRAPPERS']['stop'][]='ligneStop';
$GLOBALS['TL_WRAPPERS']['start'][]='colStart';
$GLOBALS['TL_WRAPPERS']['stop'][]='colStop';

if (TL_MODE == 'FE')
{
	$GLOBALS['TL_HOOKS']['generatePage'][] = array('Xbootstrap\Hooks','myGeneratePage');
    $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('Xbootstrap\Hooks', 'pictureDefault');
}