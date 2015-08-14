<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); // Permet de s'assurer que le script ne sera pas executé depuis l'URL.


// Fonction pour créer l'URL des fichiers css
if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

// Fonction pour créer l'URL des fichiers JavaScript
if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/javascript/' . $nom . '.js';
	}
}

// Fonction pour créer l'URL des image
if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/images/' . $nom;
	}
}

// Fonction pour créer rapidement le code HTML des images.
if (! function_exists('img'))
{
	function img($nom, $alt = '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
	}
}