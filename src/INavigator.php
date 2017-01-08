<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace JP\Navigator;

/**
 * INavigator
 * @author Jan Pospisil
 */

interface INavigator  {

	/**
	 * Add destination/link to navigator
	 * @param string $name
	 * @param string $link
	 * @return mixed
	 */
	public function add($name, $link);

	/**
	 * Render breadcrumb
	 * @return mixed
	 */
	public function render();

	/**
	 * @return array of destinations/links
	 */
	public function getDestinations();
}
