# DisplayCondUserFunc

TYPO3 6.2 LTS Backport for Feature: #62944 - UserFunc available as Display Condition (https://forge.typo3.org/issues/62944)

### Description
Being able to use userFunc as displayCondition makes it possible to check on any imaginable condition or state. If any situation can not be evaluated with any of the existing checks the developer is free to add an own user function which provides a boolean result whether to show or hide the TCA field.

```php
$GLOBALS['TCA']['tt_content']['columns']['bodytext']['displayCond'] =
	'USER:Evoweb\\Example\\User\\ElementConditionMatcher->checkHeaderGiven:any:more:information';
```

Divided by colons any parameters can be added that are sent to the ConditionMatcher class.

#### TYPO3 7.x Commit

https://github.com/TYPO3/TYPO3.CMS/commit/cdcf56c8f77321f87e4a85974e27385066a23d2c
