<?php

namespace WhatsTheMusic\Route\Routine;

use Respect\Config\Container;
use Twig_Environment;

/**
* Convert data to HTML with Twig
*/
class Twig
{
	
	public function __construct(Twig_Environment $twig = null)
	{
		if (is_null($twig)) {
			$twigContainer = new Container( CONFIG_DIR . '/twig.ini');
			$twig = $twigContainer->twig;
		}
		$this->twig = $twig;
		return $twig;
	}

	/**
	 * @param  mixed $data
	 * @return string|array
	 */
	public function __invoke($data=null)
    {
        if (is_string($data)) {
            return $data;
        }
        if (is_null($data))
            return '';
        
        if (!is_array($data) || !isset($data['_view']))
            return $data;

        $view      = $data['_view'];
        unset($data['_view']);
        return $this->twig->render($view, $data);
    }
}