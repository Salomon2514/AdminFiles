<?php

class stdObject {
    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
				  //echo $this->{$property}."<br>";
            }//foreach
        }//if
    }//constructor
}

?>
