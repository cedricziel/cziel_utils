<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Cedric Ziel - Internetdienstleistungen & EDV - Halle (Saale),
 *  Germany - http://www.cedric-ziel.com
 *  Authors: Cedric Ziel
 *  All rights reserved
 *
 *  For further information: http://www.cedric-ziel.com <info@cedric-ziel.com>
 *
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
namespace Cziel\CzielUtils\Validation\Validator;
use TYPO3\CMS\Extbase\Validation\Exception\InvalidValidationOptionsException;

/**
 * Validates given Objects by Stripping tags off and counting words
 *
 * @author Cedric Ziel <cedric@cedric-ziel.com>
 */
class WordCountValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {
	/**
	 * Check if $value is valid. If it is not valid, needs to add an error
	 * to Result.
	 *
	 * @param mixed $value The value which should be validated
	 * @throws \TYPO3\CMS\Extbase\Validation\Exception\InvalidValidationOptionsException
	 * @return boolean TRUE if the value is valid, FALSE if an error occured
	 */
	protected function isValid($value) {
		if (!isset($this->options['minimumWords']) && !isset($this->options['maximumWords'])) {
			throw new InvalidValidationOptionsException('You have to either set the \'minimumWords\' or \'maximumWords\' option in WordCountValidator', 1371728449);
		}
		if (isset($this->options['minimumWords']) && isset($this->options['maximumWords']) && ($this->options['minimumWords'] > $this->options['maximumWords'])) {
			throw new InvalidValidationOptionsException('\'minimumWords\' has to be smaller than \'maximumWords\' option in WordCountValidator', 1371729306);
		}
		$bareValue = $this->stripTags($value);

		$numberOfWords = str_word_count($bareValue, 0);

		$isValid = TRUE;
		if (isset($this->options['minimumWords']) && $numberOfWords < $this->options['minimumWords']) {
			$isValid = FALSE;
		}
		if (isset($this->options['maximumWords']) && $numberOfWords > $this->options['maximumWords']) {
			$isValid = FALSE;
		}

		if ($isValid === FALSE) {
			if (isset($this->options['minimumWords']) && isset($this->options['maximumWords'])) {
				$this->addError(
					\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate(
						'validator.wordcount.between',
						'cziel_utils',
						array(
							$this->options['minimumWords'],
							$this->options['maximumWords']
						)
					), 1371729978, array($this->options['minimumWords'], $this->options['maximumWords']));
			} elseif (isset($this->options['minimumWords'])) {
				$this->addError(
					\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate(
						'validator.wordcount.less',
						'cziel_utils',
						array(
							$this->options['minimumWords']
						)
					), 1371729984, array($this->options['minimumWords']));
			} else {
				$this->addError(
					\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate(
						'validator.wordcount.exceed',
						'cziel_utils',
						array(
							$this->options['maximumWords']
						)
					), 1371729992, array($this->options['maximumWords']));
			}
		}
		return $isValid;
	}

	/**
	 * The text which contains tags
	 *
	 * @param \string $textInput
	 * @return \string
	 */
	protected function stripTags($textInput) {
		return strip_tags($textInput);
	}

}
