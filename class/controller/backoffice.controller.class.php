<?php
class backoffice
{
    public function defaultPage($args)
    {
		$view = new vue("index", "index", "backoffice.layout");
		
    }
}