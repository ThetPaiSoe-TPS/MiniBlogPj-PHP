<?php

    class User{
        public $name= "default Name";
        public $age= "default Age";
        private $email= "keesh@gmail.com";
        public $location= "Yangon";

        public function __construct($Username, $Userage){
            $this-> name= $Username;
        }

        public function getName (){
            echo "My name is $this->name";
        }

        public function getEmail (){
            return $this-> email;
        }

        public function getLocation(){
            return $this-> location;
        }

        public function setLocation($new_loc){
            $this-> location= $new_loc;
        }

        public function __destruct()
        {
            echo "This is destruct... for $this->name <br>";
        }
    }

    class Person extends User{
        public $phone= "09765215851";
        
        public function __construct($name, $age, $phoneOne){
            parent::__construct($name, $age);
            $this-> phone= $phoneOne;
        }

    }
    $personOne= new Person("Pai", 31, "0933425323");

    $user_one= new User("Maung Maung", 30);

    unset($user_one);
    echo "<pre>";
    // $user_one-> setLocation("Mandalay");
    // print_r($user_one-> getLocation());
    print_r($personOne);