<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function translateToWords($number) {
    /*     * ***
     * A recursive function to turn digits into words
     * Numbers must be integers from -999,999,999,999 to 999,999,999,999 inclussive.    
     *
     *  (C) 2010 Peter Ajtai
     *    This program is free software: you can redistribute it and/or modify
     *    it under the terms of the GNU General Public License as published by
     *    the Free Software Foundation, either version 3 of the License, or
     *    (at your option) any later version.
     *
     *    This program is distributed in the hope that it will be useful,
     *    but WITHOUT ANY WARRANTY; without even the implied warranty of
     *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *    GNU General Public License for more details.
     *
     *    See the GNU General Public License: <http://www.gnu.org/licenses/>.
     *
     */
    // zero is a special case, it cause problems even with typecasting if we don't deal with it here
    $max_size = pow(10, 18);
    if (!$number)
        return "zero";
    if (is_int($number) && $number < abs($max_size)) {
        switch ($number) {
            // set up some rules for converting digits to words
            case $number < 0:
                $prefix = "negative";
                $suffix = translateToWords(-1 * $number);
                $string = $prefix . " " . $suffix;
                break;
            case 1:
                $string = "one";
                break;
            case 2:
                $string = "two";
                break;
            case 3:
                $string = "three";
                break;
            case 4:
                $string = "four";
                break;
            case 5:
                $string = "five";
                break;
            case 6:
                $string = "six";
                break;
            case 7:
                $string = "seven";
                break;
            case 8:
                $string = "eight";
                break;
            case 9:
                $string = "nine";
                break;
            case 10:
                $string = "ten";
                break;
            case 11:
                $string = "eleven";
                break;
            case 12:
                $string = "twelve";
                break;
            case 13:
                $string = "thirteen";
                break;
            // fourteen handled later
            case 15:
                $string = "fifteen";
                break;
            case $number < 20:
                $string = translateToWords($number % 10);
                // eighteen only has one "t"
                if ($number == 18) {
                    $suffix = "een";
                } else {
                    $suffix = "teen";
                }
                $string .= $suffix;
                break;
            case 20:
                $string = "twenty";
                break;
            case 30:
                $string = "thirty";
                break;
            case 40:
                $string = "forty";
                break;
            case 50:
                $string = "fifty";
                break;
            case 60:
                $string = "sixty";
                break;
            case 70:
                $string = "seventy";
                break;
            case 80:
                $string = "eighty";
                break;
            case 90:
                $string = "ninety";
                break;
            case $number < 100:
                $prefix = translateToWords($number - $number % 10);
                $suffix = translateToWords($number % 10);
                $string = $prefix . "-" . $suffix;
                break;
            // handles all number 100 to 999
            case $number < pow(10, 3):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number / pow(10, 2)))) . " hundred";
                if ($number % pow(10, 2))
                    $suffix = " and " . translateToWords($number % pow(10, 2));
                $string = $prefix . $suffix;
                break;
            case $number < pow(10, 6):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number / pow(10, 3)))) . " thousand";
                if ($number % pow(10, 3))
                    $suffix = translateToWords($number % pow(10, 3));
                $string = $prefix . " " . $suffix;
                break;
            case $number < pow(10, 9):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number / pow(10, 6)))) . " million";
                if ($number % pow(10, 6))
                    $suffix = translateToWords($number % pow(10, 6));
                $string = $prefix . " " . $suffix;
                break;
            case $number < pow(10, 12):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number / pow(10, 9)))) . " billion";
                if ($number % pow(10, 9))
                    $suffix = translateToWords($number % pow(10, 9));
                $string = $prefix . " " . $suffix;
                break;
            case $number < pow(10, 15):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number / pow(10, 12)))) . " trillion";
                if ($number % pow(10, 12))
                    $suffix = translateToWords($number % pow(10, 12));
                $string = $prefix . " " . $suffix;
                break;
            // Be careful not to pass default formatted numbers in the quadrillions+ into this function
            // Default formatting is float and causes errors
            case $number < pow(10, 18):
                // floor return a float not an integer
                $prefix = translateToWords(intval(floor($number / pow(10, 15)))) . " quadrillion";
                if ($number % pow(10, 15))
                    $suffix = translateToWords($number % pow(10, 15));
                $string = $prefix . " " . $suffix;
                break;
        }
    } else {
        echo "ERROR with - $number<br/> Number must be an integer between -" . number_format($max_size, 0, ".", ",") . " and " . number_format($max_size, 0, ".", ",") . " exclussive.";
    }
    return $string;
}

echo translateToWords(12);
?>
