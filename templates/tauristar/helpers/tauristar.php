<?php
defined('_JEXEC') or die();

class TauristarHelper
{

	public static function compile()
	{
		JLoader::import('joomla.filesystem.folder');
		JLoader::import('joomla.filesystem.file');
		try
		{
			JLoader::import('lessphp.Less', JPATH_THEMES . '/tauristar/helpers');
			$parser = new Less_Parser(array(
					'relativeUrls' => false
			));

			// Setting the directorys of joomla bootsrap path
			$parser->SetImportDirs(array(
					JPATH_ROOT . '/media/jui/bs3/' => '../../../media/jui/bs3/'
			));
			$parser->parseFile(JPATH_THEMES . '/tauristar/less/template.less', JUri::base());
			$css = $parser->getCss();

			// The scheme is added to the fa font path
// 			$css = str_replace('https://templates/tauristar/font', JUri::base() . 'templates/dpstrap/font', $css);
// 			$css = str_replace('http://templates/tauristar/font', JUri::base() . 'templates/dpstrap/font', $css);
// 			$css = self::compress($css);

			// Writting the compressed css content to the cache file
			JFile::write(JPATH_THEMES . '/tauristar/css/template.css', $css);
		}
		catch (Exception $e)
		{
			JFactory::getApplication()->enqueueMessage($e->getMessage());
		}
	}

	public static function compress($text)
	{
		return str_replace(array(
				"\r\n",
				"\r",
				"\n",
				"\t",
				'  ',
				'    ',
				'    '
		), '', $text);
	}
}
