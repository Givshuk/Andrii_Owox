<?php 

abstract class Tariff {
	
	protected $value;

    public function getTariff()
    {
        return $this->value;
    }
}

abstract class Lessons {

    private $tariff;
    private $amount;


    public function __construct($tariff, $amount)
    {
        $this->tariff  = $tariff;
        $this->amount = $amount;
    }

    public function getCost()
    {
        echo $this->tariff  * $this->amount;
    }
	
}

class Speaking extends Lessons {}

class Grammar extends Lessons {}

class Fixed extends Tariff {

	protected $value = 200;
}

class Hourly extends Tariff {

    protected $value = 100; 

}




class Factory {
	
	public static function make($type)
	{
		$className = $type['type'];
		
		if(class_exists($type['tariff']) && class_exists($className)) {
			
			$tariff = new $type['tariff'];

		    return new $className($tariff->getTariff(), $type['quantity']);
			
		} else {
		
			throw new Exception('Class not found');

		}
		
	}
}

class Lesson
{
    public function create($type)
    {

        $product = Factory::make($type);

        return $product;
    }
}

$typeLessons = [
    "speaking" => [
        'type'  => 'Speaking',
		'tariff' => 'fixed',
		'amount' => 2

    ],
    "grammar" => [
		'type'  => 'Grammar',
        'tariff' => 'hourly',
		'amount' => 1

    ]
];







