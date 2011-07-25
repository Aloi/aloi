<?php
/* Copyright 2010 aloi-project
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA
 */

/**
 * The Aloi_Core component provides the base functions for utilising
 * the framework, such as configuring the frameworks autoload and
 * system paths, as well as accessing the core logging component.
 *
 * @author Cameron Manderson <cameronmanderson@gmail.com> (Aloi Contributor)
 * @version $Id$
 */
class Aloi_Core {
	
	
	/**
	 * Return with the path to Aloi library files. Determined based on the location
	 * of the 'Aloi.php' file if not set using the 'setPath' function.
	 * @return string
	 */
	public static function getPath() {
		if(!self::$path) {
			self::$path = realpath(dirname(__FILE__) . '/..');
		}
		return self::$path;
	}
	
	/**
	 * Set the path to Aloi.php library. This can overwrite the default
	 * value identified using the Aloi_Core::getPath() function.
	 * @param $path
	 */
	public static function setPath($path) {
		self::$path = $path;
	}

	/**
	 * Returns a logging object to use for logging info/debug/warn/error
	 * events in the application. The Logging Component can be configured to
	 * use a different logging framework, or an implementation such as Log4PHP
	 * provided by Apache.
	 *
	 * @return Aloi_Util_Logger object
	 */
	public static function getLog($className = null) {
		if(empty($className)) {
			// Return the root logger manager
			return Aloi_Util_Logger_Manager::getRootLogger();
		} else {
			return Aloi_Util_Logger_Manager::getLogger($className);
		}
	}
	
	
}