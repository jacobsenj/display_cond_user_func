<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Backend\\Form\\ElementConditionMatcher'] = array(
	'className' => 'JensJacobsen\\DisplayCondUserFunc\\CMS\\Backend\\Form\\ElementConditionMatcher'
);
