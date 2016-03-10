<?php
class home
{
	public function __construct($args){

	}

    public function defaultPage($args)
    {
      $view = new vue("index", "index", "home.layout");
    }

}
