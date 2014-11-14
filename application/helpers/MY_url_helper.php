<?php

if ( ! defined('BASEPATH')) exit('No direct access allowed');

// Ré-écriture de la fonction site_url pour offrir la possibilité de lui passer autant d'arguments que voulu.
if ( ! function_exists('site_url'))
{
	function site_url($uri = '')
	{
		if ( ! is_array($uri))
		{
			//Tous les paramètres sont insérés dans un tableau.
			$uri = func_get_args();
		}

		// on remet ensuite ce qui était dans l'helpeur de base
		$CI =& get_instance();
		return $CI->config->site_url($uri);
	}
}


// -------------------------------------------------------------------------------------------------------------

// Ajout de la fonction url, permettant de faire des liens plus rapidements
if ( ! function_exists('url'))
{
	function url($text, $uri = '')
	{
		if ( ! is_array($uri))
		{
			$uri = func_get_args();
			array_shift($uri);
		}

		echo '<a href="' . site_url($uri) . '">' . htmlentities($text) . '</a>';
		return '';
	}
}



/* Fin du fichier MY_url_helper

Location : ./aplication/helpers/MY_url_helper.php */