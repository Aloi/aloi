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
 * 
 * This file incorporates work covered by the following copyright and 
 * permissions notice:
 * 
 * Copyright (C) 2008 PHruts
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
 * 
 * This file incorporates work covered by the following copyright and
 * permission notice:
 *
 * Copyright 2004 The Apache Software Foundation
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Locale
 *
 * <p>A Locale object represents a specific geographical, political, or
 * cultural region. An operation that requires a Locale to perform its
 * task is called locale-sensitive and uses the Locale to tailor
 * information for the user.</p>
 * <p>The language argument is a valid ISO Language Code. These codes are the
 * lower-case, two-letter codes as defined by ISO-639. You can find a full list
 * of these codes at a number of sites, such as:
 * {@link http://www.ics.uci.edu/pub/ietf/http/related/iso639.txt
 * http://www.ics.uci.edu/pub/ietf/http/related/iso639.txt}.</p>
 * <p>The country argument is a valid ISO Country Code. These codes are the
 * upper-case, two-letter codes as defined by ISO-3166. You can find a full list
 * of these codes at a number of sites, such as:
 * {@link http://www.chemie.fu-berlin.de/diverse/doc/ISO_3166.html
 * http://www.chemie.fu-berlin.de/diverse/doc/ISO_3166.html}.</p>
 * <p>The variant argument is a vendor or browser-specific code. For example,
 * use WIN for Windows, MAC for Macintosh, and POSIX for POSIX. Where there
 * are two variants, separate them with an underscore, and put the most
 * important one first. For example, a Traditional Spanish collation might
 * construct a locale with parameters for language, country and variant as:
 * "es", "ES", "Traditional_WIN".</p>
 * 
 * @author Olivier HENRY <oliv.henry@gmail.com> (PHP5 port of Struts)
 * @author John WILDENAUER <jwilde@users.sourceforge.net> (PHP4 port of Struts)
 * @version $Id$
 */
class Aloi_Util_Locale {
	/**
	 * Locale which represents the English language.
	 * @var Locale
	 */
	public static $ENGLISH;

	/**
	 * Locale which represents the French language.
	 * @var Locale
	 */
	public static $FRENCH;

	/**
	 * Locale which represents the German language.
	 * @var Locale
	 */
	public static $GERMAN;

	/**
	 * Locale which represents the Italian language. 
	 * @var Locale
	 */
	public static $ITALIAN;

	/**
	 * Locale which represents the Japanese language.
	 * @var Locale
	 */
	public static $JAPANESE;

	/**
	 * Locale which represents the Korean language.
	 * @var Locale
	 */
	public static $KOREAN;

	/**
	 * Locale which represents the Chinese language.
	 * @var Locale
	 */
	public static $CHINESE;

	/**
	 * Locale which represents the Chinese language as used in China.
	 * @var Locale
	 */
	public static $SIMPLIFIED_CHINESE;

	/**
	 * Locale which represents the Chinese language as used in Taiwan.
	 * 
	 * Same as TAIWAN Locale.
	 * @var Locale
	 */
	public static $TRADITIONAL_CHINESE;

	/**
	 * Locale which represents France.
	 * @var Locale
	 */
	public static $FRANCE;

	/**
	 * Locale which represents Germany.
	 * @var Locale
	 */
	public static $GERMANY;

	/**
	 * Locale which represents Italy.
	 * @var Locale
	 */
	public static $ITALY;

	/**
	 * Locale which represents Japan.
	 * @var Locale
	 */
	public static $JAPAN;

	/**
	 * Locale which represents Korea.
	 * @var Locale
	 */
	public static $KOREA;

	/**
	 * Locale which represents China.
	 * 
	 * Same as SIMPLIFIED_CHINESE Locale.
	 * @var Locale
	 */
	public static $CHINA;

	/**
	 * Locale which represents the People's Republic of China.
	 * 
	 * Same as CHINA Locale.
	 * @var Locale
	 */
	public static $PRC;

	/**
	 * Locale which represents Taiwan.
	 * 
	 * Same as TRADITIONAL_CHINESE Locale.
	 * @var Locale
	 */
	public static $TAIWAN;

	/**
	 * Locale which represents the United Kingdom.
	 * @var Locale
	 */
	public static $UK;

	/**
	 * Locale which represents the United States.
	 * @var Locale
	 */
	public static $US;

	/**
	 * Locale which represents the English speaking portion of Canada.
	 * @var Locale
	 */
	public static $CANADA;

	/**
	 * Locale which represents the French speaking portion of Canada.
	 * @var Locale
	 */
	public static $CANADA_FRENCH;

	/**
	 * The language code, as returned by getLanguage().
	 *
	 * @var string
	 */
	private $language = '';

	/**
	 * The country code, as returned by getCountry().
	 *
	 * @var string
	 */
	private $country = '';

	/**
	 * The variant code, as returned by getVariant().
	 *
	 * @var string
	 */
	private $variant = '';

	/**
	 * The default locale.
	 * 
	 * @var Locale
	 */
	private static $defaultLocale = null;

	/**
	 * Construct a locale from language, country, variant.
	 *
	 * @param string $language Lowercase two-letter ISO-639 A2 language code.
	 * @param string $country Uppercase two-letter ISO-3166 A2 country code.
	 * @param string $variant Vendor and browser specific code.
	 * See class description.
	 */
	public function __construct($language, $country = '', $variant = '') {
		$this->language = strtolower(trim($language));
		$this->country = strtoupper(trim($country));
		$this->variant = trim($variant);
	}

	/**
	 * Returns the default Locale.
	 * 
	 * The default locale is generally once set on start up and then never
	 * changed. Normally you should use this locale for everywhere you need
	 * a locale. The initial setting matches the default locale, the user has
	 * chosen.
	 *
	 * @return Locale
	 */
	public static function getDefault() {
		return self :: $defaultLocale;
	}

	/**
	 * Changes the default locale.
	 *
	 * Normally only called on program start up.
	 *
	 * @param Locale $newLocale The new default locale
	 */
	public static function setDefault($newLocale) {
		self :: $defaultLocale = $newLocale;
	}

	/**
	 * Returns the language code of this locale.
	 *
	 * @return string
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * Returns the country code of this locale.
	 *
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Returns the variant code of this locale.
	 *
	 * @return string
	 */
	public function getVariant() {
		return $this->variant;
	}

	/**
	 * Gets the string representation of the current locale.
	 *
	 * This consists of the language, the country, and the variant, separated
	 * by an underscore. The variant is listed only if there is a language or
	 * country.<br/>
	 * Examples : 'en', 'de_DE', '_GB', 'en_US_WIN', 'de__POSIX', 'fr__MAC'
	 *
	 * @return string
	 */
	public function __toString() {
		if ($this->language == '' && $this->country == '')
			return '';
		elseif ($this->country == '' && $this->variant == '') return $this->language;

		$result = $this->language;
		$result .= '_' . $this->country;
		if ($this->variant != '')
			$result .= '_' . $this->variant;

		return $result;
	}

	/**
	 * Compares two locales.
	 * 
	 * To be equal, obj must be a Locale with the same language, country
	 * and variant code.
	 * 
	 * @param object $obj
	 * @return boolean True if obj is equal to this
	 */
	public function equals($obj) {
		if (get_class($obj) != 'Aloi_Util_Locale')
			return false;
		return ($this->language == $obj->getLanguage() && $this->country == $obj->getCountry() && $this->variant == $obj->getVariant());
	}
}

// Setting convenient constants
Aloi_Util_Locale :: $ENGLISH = new Aloi_Util_Locale('en');
Aloi_Util_Locale :: $FRENCH = new Aloi_Util_Locale('fr');
Aloi_Util_Locale :: $GERMAN = new Aloi_Util_Locale('de');
Aloi_Util_Locale :: $ITALIAN = new Aloi_Util_Locale('it');
Aloi_Util_Locale :: $JAPANESE = new Aloi_Util_Locale('ja');
Aloi_Util_Locale :: $KOREAN = new Aloi_Util_Locale('ko');
Aloi_Util_Locale :: $CHINESE = new Aloi_Util_Locale('zh');
Aloi_Util_Locale :: $SIMPLIFIED_CHINESE = new Aloi_Util_Locale('zh', 'CN');
Aloi_Util_Locale :: $TRADITIONAL_CHINESE = new Aloi_Util_Locale('zh', 'TW');
Aloi_Util_Locale :: $FRANCE = new Aloi_Util_Locale('fr', 'FR');
Aloi_Util_Locale :: $GERMANY = new Aloi_Util_Locale('de', 'DE');
Aloi_Util_Locale :: $ITALY = new Aloi_Util_Locale('it', 'IT');
Aloi_Util_Locale :: $JAPAN = new Aloi_Util_Locale('ja', 'JP');
Aloi_Util_Locale :: $KOREA = new Aloi_Util_Locale('ko', 'KR');
Aloi_Util_Locale :: $CHINA = Aloi_Util_Locale :: $SIMPLIFIED_CHINESE;
Aloi_Util_Locale :: $PRC = Aloi_Util_Locale :: $CHINA;
Aloi_Util_Locale :: $TAIWAN = Aloi_Util_Locale :: $TRADITIONAL_CHINESE;
Aloi_Util_Locale :: $UK = new Aloi_Util_Locale('en', 'GB');
Aloi_Util_Locale :: $US = new Aloi_Util_Locale('en', 'US');
Aloi_Util_Locale :: $CANADA = new Aloi_Util_Locale('en', 'CA');
Aloi_Util_Locale :: $CANADA_FRENCH = new Aloi_Util_Locale('fr', 'CA');
?>
