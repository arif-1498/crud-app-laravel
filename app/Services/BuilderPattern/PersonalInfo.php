<?php
namespace App\Services\BuilderPattern;

use App\Services\BuilderPattern\Builder;



 class Person
{
    public string $name = '';
    public string $role = '';
    public string $education = '';
    public string $interests = '';

    public function __toString(): string
    {
        return "Person:\n" .
               "  Name:       {$this->name}\n" .
               "  Role:       {$this->role}\n" .
               "  Education:  {$this->education}\n" .
               "  Interests:  {$this->interests}\n";
    }
}

class PersonalInfo implements Builder{


     Protected Person $person;

    public function __construct( ){
        $this->person=new Person();
    }

    public function name($name){
        $this->person->name=$name;
        return $this;

    }
   public function role($role): static{

    $this->person->role=$role;
    return $this;
    
   }

   public function interests( $interests){
    $this->person->interests=$interests;
    return $this;

   }
   public function education($education){
    $this->person->education=$education;
    return $this;

   }

   public function getInfo() {
      return $this->person;
   }

}

   