<?php
namespace Cziel\CzielUtils\Tests\Validation\Validator;

	/*                                                                        *
	 * This script belongs to the Extbase framework.                            *
	 *                                                                        *
	 * It is free software; you can redistribute it and/or modify it under    *
	 * the terms of the GNU Lesser General Public License as published by the *
	 * Free Software Foundation, either version 3 of the License, or (at your *
	 * option) any later version.                                             *
	 *                                                                        *
	 * This script is distributed in the hope that it will be useful, but     *
	 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
	 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
	 * General Public License for more details.                               *
	 *                                                                        *
	 * You should have received a copy of the GNU Lesser General Public       *
	 * License along with the script.                                         *
	 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
	 *                                                                        *
	 * The TYPO3 project - inspiring people to share!                         *
	 *                                                                        */

/**
 * Testcase for the string length validator
 *
 * @author Cedric Ziel <cedric@cedric-ziel.com>
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class WordCountValidatorTest extends \TYPO3\CMS\Extbase\Tests\Unit\Validation\Validator\AbstractValidatorTestcase {

	protected $validatorClassName = 'Cziel\\CzielUtils\\Validation\\Validator\\WordCountValidator';

	/**
	 * @test
	 */
	public function wordCountValidatorShouldValidateMinimumWords() {
		$this->validator = $this->getValidator(array(
			'minimumWords' => 3
		));
		$this->assertFalse($this->validator->validate('Hello World, Buddy!')->hasErrors());
	}

	/**
	 * @test
	 */
	public function wordCountValidatorShouldValidateMaximumWords() {
		$this->validator = $this->getValidator(array(
			'maximumWords' => 10
		));
		$this->assertFalse($this->validator->validate('Hello World, Buddy!')->hasErrors());
	}

	/**
	 * @test
	 */
	public function wordCountValidatorShouldValidateFalseIfMinimumWordsAreGreaterThanMaximumWords() {
		$this->validator = $this->getValidator(array(
			'minimumWords' => 5,
			'maximumWords' => 10
		));
		$this->assertFalse($this->validator->validate('Hello World, Buddy! Blowing Minds since')->hasErrors());
	}

	/**
	 * @test
	 */
	public function wordCountValidatorReturnsFalseIfThereAreTooManyWords() {
		$this->validator = $this->getValidator(array(
			'maximumWords' => 5
		));

		$this->assertTrue($this->validator->validate('Hello World, Buddy! Blowing Minds since')->hasErrors());
	}

}

?>