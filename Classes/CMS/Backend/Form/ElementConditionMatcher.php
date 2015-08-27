<?php
namespace JensJacobsen\DisplayCondUserFunc\CMS\Backend\Form;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ElementConditionMatcher implements the TCA 'displayCond' option.
 * The display condition is a colon separated string which describes
 * the condition to decide whether a form field should be displayed.
 *
 * Backport for Feature: #62944 - UserFunc available as Display Condition
 * Commit: https://github.com/TYPO3/TYPO3.CMS/commit/cdcf56c8f77321f87e4a85974e27385066a23d2c
 */
class ElementConditionMatcher extends \TYPO3\CMS\Backend\Form\ElementConditionMatcher {
	/**
	 * Evaluates the provided condition and returns TRUE if the form
	 * element should be displayed.
	 * The condition string is separated by colons and the first part
	 * indicates what type of evaluation should be performed.
	 *
	 * @param string $displayCondition
	 * @param array $record
	 * @param string $flexformValueKey
	 * @return bool
	 * @see match()
	 */
	protected function matchSingle($displayCondition, array $record = array(), $flexformValueKey = '') {
		$this->record           = $record;
		$this->flexformValueKey = $flexformValueKey;
		$result                 = FALSE;
		list($matchType, $condition) = explode(':', $displayCondition, 2);
		switch ($matchType) {
			case 'USER':
				$result = $this->matchUserCondition($condition);
				break;
			default:
				$result = parent::matchSingle($displayCondition, $record, $flexformValueKey);
		}
		return $result;
	}


	/**
	 * Evaluates via the referenced user-defined method
	 *
	 * @param string $condition
	 * @return bool
	 */
	protected function matchUserCondition($condition) {
		$conditionParameters = explode(':', $condition);
		$userFunction        = array_shift($conditionParameters);

		$parameter = array(
			'record'              => $this->record,
			'flexformValueKey'    => $this->flexformValueKey,
			'conditionParameters' => $conditionParameters
		);

		return (bool)GeneralUtility::callUserFunction($userFunction, $parameter, $this);
	}
}
