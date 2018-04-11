<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Navigator;
use Nette\Utils\Html;

/**
 * IRenderer
 * @author Jan Pospisil
 */

interface IRenderer  {

	/**
	 * @param INavigator $navigator
	 * @return Html
	 */
	public function toString(INavigator $navigator);
	
}
