<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'DisplayCond User Function',
	'description' => 'A backport extension for TYPO3 6.2 - Backports Feature: #62944 - UserFunc available as Display Condition',
	'category' => 'be',
	'author' => 'Jens Jacobsen',
	'author_email' => 'typo3@jens-jacobsen.de',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 1,
	'version' => '6.2.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
