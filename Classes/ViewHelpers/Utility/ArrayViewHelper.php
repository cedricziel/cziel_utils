<?php
namespace Cziel\CzielUtils\ViewHelpers\Utility;
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
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 *  This ViewHelper handles the creation of arrays.
 *
 * @author Cedric Ziel <cedric@cedric-ziel.com>
 */
class ArrayViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param \string $index The name of the index
	 * @param \string $as the name of the variable
	 * @param mixed $value The value of the index
	 * @return void
	 */
	public function render($index, $as, $value = NULL) {
		$array = array();

		$array[$index] = $value;

		if ($this->templateVariableContainer->exists($as) === TRUE) {
			$this->templateVariableContainer->remove($as);
		}

		$this->templateVariableContainer->add($as, $array);

		return NULL;
	}
}