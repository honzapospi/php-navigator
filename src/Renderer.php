<?php

namespace JP\Navigator;
use Nette\Utils\Html;

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 * Renderer
 * @author Jan Pospisil
 */

class Renderer extends \Nette\Object implements IRenderer {

	private $minRenderDestinations = 1;
	private $container;

	public function __construct() {
		$this->container = Html::el('nav');
	}

	public function setContainer(Html $container){
		$this->container = $container;
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
		$ul = Html::el('ul');
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

//      <div class="small-breadcrumb">
//         <div class="container">
//            <div class=" breadcrumb-link">
//               <ul>
//                  <li><a href="index.html">Home Page</a></li>
//                  <li><a href="#">Pages</a></li>
//                  <li><a class="active" href="#">Contact</a></li>
//               </ul>
//            </div>
//         </div>
//      </div>
