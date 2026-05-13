<?php
class Person{
    public function temp(){
        return "temp";
    }
}

class Student extends Person{
}

$student = new Student();
echo $student->temp();