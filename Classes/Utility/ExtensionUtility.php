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
namespace Cziel\CzielUtils\Utility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 *  Utilities Regarding registering Extensions in the core
 *
 * @author Cedric Ziel <cedric@cedric-ziel.com>
 */
class ExtensionUtility {

	/**
	 * Generates a Plugin Signature. Can be used in ext_localconf
	 *
	 * @param \string $_EXTKEY The Extension Key
	 * @param \string $pluginKey The plugin key you used
	 * @return \string
	 * @api
	 */
	static public function createPluginSignature($_EXTKEY = '', $pluginKey = '') {
		$extensionName = GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
		return $coreIndustriesTagCloudPluginSignature = strtolower($extensionName) . '_' . strtolower($pluginKey);
	}

}