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
	private static $path;
	/**
	 * An SPL autoloader that will attempt to autoload a class when
	 * it is required.
	 *
	 * If the class begins with 'Aloi_' it will be attempted to be included
	 * directly, without invoking the Aloi_Serphlet_ClassLoader class.
	 *
	 * @param $class
	 * @return boolean whether the class was successfully included
	 */
	public static function autoload($className) {
		// Determine if autoload is scoped correctly
		if(class_exists($className, false) || interface_exists($className, false)) {
			return false;
		}
		// Determine the actual path and load the file
		$classRealPath = self::getPath() . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
		if(stripos($className, 'Aloi_') == 0 && file_exists($classRealPath)) {
			require $classRealPath;
			return true;
		} else {
			// Try using the class loader
			try {
				Aloi_Serphlet_ClassLoader::loadClass($className);
			} catch(Exception $e) {}
		}
		return false;
	}
	
	/**
	 * A method to allow developers to add include paths to the
	 * current PHP configuration. The path is used by the autoloader
	 * and PHP to find relative classes.
	 *
	 * @param $path The path to add to the PHP include path
	 */
	public static function addIncludePath($path) {
		if(is_array($path)) {
			foreach($path as $inclosedPath)
				self::addIncludePath($inclosedPath);
		} else {
			set_include_path(get_include_path() . PATH_SEPARATOR . $path);
		}
	}
	
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
	 * Adds the aloi autoloader to the spl autoload register
	 * and can optionally set include paths. Use this to register
	 * Aloi into the application environment.
	 *
	 * @param array $includePaths comma seperated list of include paths for PHP
	 */
	public static function registerAutoload($includePaths = null) {
		spl_autoload_register(array('Aloi', 'autoload'));
		if(!empty($includePaths)) self::addIncludePath($includePaths);
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