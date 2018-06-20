<?php

// STATIC
class Tools {

	static function pre($thing) {
		echo "<pre>";
		print_r($thing);
		echo "</pre>";
	}

	static function log($text) {
		file_put_contents('/tmp/mylog.txt', $text . PHP_EOL, FILE_APPEND);	
	}

}

Tools::log("Ce que je veux");



interface Fighter {
	function attack(Hero $hero);
}



class Hero implements Fighter {

	protected $name;

	public function __construct($name) {

		$this->hp = 30;
		$this->name = $name;
	}

	public function attack(Hero $hero) {
		$damage = rand(1, 10);

		$hero->hp -= $damage;
	}

	public function getName() {
		return $this->name;
	}

}

$fafnir = new Hero("Fafnir");

$aragorn = new Hero("Aragorn");

Tools::pre($fafnir);
Tools::pre($aragorn);

$fafnir->attack($aragorn);

