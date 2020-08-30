<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * Convert string whitout character special
 * @access	public
 * @param	string	the String to convert
 * @return	string
 */
if ( ! function_exists('permalink_admin'))
{
	function permalink_admin($string)

    {
            $rules =array (

                '/(á)|(à)|(ã)|(â)/'=>'a',
                '/(é)|(è)|(ê)/' =>'e',
                '/(í)|(ì)|(î)/' =>'i',
                '/(ô)|(ó)|(ò)|(õ)/'=>'o',
                '/(ù)|(ú)|(û)/' =>'u',
                '/(Á)|(À)|(Â)|(Ã)/'=>'A',
                '/(É)|(È)|(Ê)/' =>'E',
                '/(Í)|(Ì)|(Î)/' =>'I',
                '/(Ô)|(Ó)|(Ò)|(Ô)/'=>'O',
                '/Ç/'     =>'C',
                '/ç/'     =>'c',
                '/ /'=>'-'

            );

            $parmlink = preg_replace( array_keys($rules), array_values($rules) ,  $string );

			 return trim($parmlink);
    }

}

// ------------------------------------------------------------------------

