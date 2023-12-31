<?php
/* ===========================================================================
 * Opis Project
 * http://opis.io
 * ===========================================================================
 * Copyright 2015-2016 Marius Sarca
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================================ */

namespace illustrate\Utils;

class Dir
{

    /**
     * Constructor
     */
    protected function __construct()
    {
        // empty constructor
    }

    /**
     * Copy directory
     * 
     * @param   string  $source
     * @param   string  $dest
     * 
     * @return  boolean
     */
    public static function copy($source, $dest)
    {
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }

        if (is_file($source)) {
            return copy($source, $dest);
        }

        if (!is_dir($dest)) {
            mkdir($dest);
        }

        $dir = dir($source);

        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            static::copy("$source/$entry", "$dest/$entry");
        }

        $dir->close();
        return true;
    }

    /**
     * Remove directory
     * 
     * @param   string  $dirname
     * 
     * @return  boolean
     */
    public static function remove($dirname)
    {
        if (!is_dir($dirname)) {
            return false;
        }

        $dir = dir($dirname);

        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            $item = $dirname . '/' . $entry;

            if (is_dir($item)) {
                static::remove($item);
            } else {
                unlink($item);
            }
        }

        return rmdir($dirname);
    }
}
