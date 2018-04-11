<?php

namespace JP\Navigator;
use Nette\Utils\Html;
use Nette\SmartObject;

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 * Renderer
 * @author Jan Pospisil
 */

class Renderer implements IRenderer {
	use SmartObject;

	private $minRenderDestinations = 1;
	private $container;
	private $listElement;

	public function __construct() {
		$this->container = Html::el('nav');
		$this->listElement = Html::el('ul');
	}

	public function setContainer(Html $container){
		$this->container = $container;
	}

	public function setListElement(Html $el){
		$this->listElement = $el;
	}

	/**
	 * @param INavigator $navigator
	 * @return Html
	 */
	public function toString(INavigator $navigator){
		if(count($navigator->getDestinations()) <= $this->minRenderDestinations){
			return '';
		}
		$container = $this->container;
		$ul = $this->listElement;
		foreach($navigator->getDestinations() as $params){
			$li = Html::el('li');
			$a = Html::el('a')->setHtml($params['name'])->setAttribute('href', $params['link']);
			$li->addHtml($a);
			$ul->addHtml($li);
		}
		$container->addHtml($ul);
		return $container;
	}

}

