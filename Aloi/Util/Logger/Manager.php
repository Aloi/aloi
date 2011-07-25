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
 *
 * @author Cameron Manderson <cameronmanderson@gmail.com> (Aloi Contributor)
 */
class Aloi_Util_Logger_Manager {
	
	// Set this class to wrapper an alternate logger manager
	private static $loggerManagerClass;
	public static function setLoggerManagerClass($class) {
		self::$loggerManagerClass = $class;
	}
	
	public static function getLogger($name, $factory = null) {
		if(!empty(self::$loggerManagerClass)) {
			return call_user_func(array(self::$loggerManagerClass, 'getLogger'), $name, $factory);
		} else {
			return new Aloi_Util_Logger();
		}
	}
	public static function getRootLogger() {
		if(!empty(self::$loggerManagerClass)) {
			return call_user_func(array(self::$loggerManagerClass, 'getRootLogger'));
		} else {
			return new Aloi_Util_Logger();
		}
	}
}