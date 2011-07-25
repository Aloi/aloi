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
 * Simple class for handling class loading
 * @author camm
 */
class Aloi_ClassLoader {

    private $prefixes = array();
    private $fallbackIncludePaths = array();

    public function registerPrefixes(array $prefixes) {
        $this->prefixes = array_merge($this->prefixes, $prefixes);
    }

    public function load($className) {
        // Load the class based on known prefixes
        foreach($this->prefixes as $prefix => $directory) {
            if(strpos($className, $prefix) === 0) {
                // We have a match
                $file = $directory . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
                if(file_exists($file)) {
                    require($file);
                }
                return;
            }
        }

        try {
            // Attempt to use the classloader
            if(strpos($className, 'Aloi_Serphlet_ClassLoader') !== 0) {
                Aloi_Serphlet_ClassLoader::loadClass($className);
            }
        } catch(Exception $e) {}
    }

    public function register() {
        // Register with the spl_autoloader
        spl_autoload_register(array($this, 'load'));
        if(!empty($this->fallbackIncludePaths)) {
            foreach($this->fallbackIncludePaths as $path) {
                set_include_path(get_include_path() . PATH_SEPARATOR . $path);
            }
        }
    }

    public function registerFallbackIncludePaths(array $paths) {
        $this->fallbackIncludePaths = array_merge($this->fallbackIncludePaths, $paths);
    }
}
