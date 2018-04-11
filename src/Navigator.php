<?php
namespace JP\Navigator;
use Nette\Localization\ITranslator;
use Nette\SmartObject;

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 * Navigator
 * @author Jan Pospisil
 */

class Navigator implements INavigator {
	use SmartObject;

	private $destinations;
	private $renderer;
	private $translator;

	/**
	 * @param ITranslator $translator
	 */
	public function setTranslator(ITranslator $translator){
		$this->translator = $translator;
	}

	/**
	 * Add destination/link to navigator
	 * @param string $name
	 * @param string $link
	 * @return mixed
	 */
	public function add($name, $link){
		$this->destinations[] = array(
			'name' => $this->translate($name),
			'link' => $link
		);
	}

	private function translate($msg){
		return $this->translator ? $this->translator->translate($msg) : $msg;
	}

	/**
	 * Render breadcrumb
	 */
	public function render(){
		echo $this->toString();
	}

	/**
	 * @return array of destinations/links
	 */
	public function getDestinations(){
		return $this->destinations;
	}

	/**
	 * @return \Nette\Utils\Html
	 */
	public function toString(){
		return $this->getRenderer()->toString($this);
	}

	/**
	 * @return Renderer
	 */
	public function getRenderer(){
		if(!$this->renderer)
			$this->renderer = new Renderer();
		return $this->renderer;
	}

	/**
	 * @param IRenderer $renderer
	 */
	public function setRenderer(IRenderer $renderer){
		$this->renderer = $renderer;
	}

}
