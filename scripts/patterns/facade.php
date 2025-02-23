<?php

// сделать возможность простого доступа к сложной структуре

readonly class ComponentA {}
readonly class ComponentB
{
    public function __construct(public ComponentA $componentA)
    {
    }
}

readonly class ComponentC
{
    public function __construct(public ComponentA $componentA, public ComponentB $componentB)
    {
    }
}

readonly class System
{
    public function __construct(
        public ComponentA $componentA,
        public ComponentB $componentB,
        public ComponentC $componentC
    ) {
    }
}
// сложно создавать
$componentA = new ComponentA();
$componentB = new ComponentB($componentA);
$componentC = new ComponentC($componentA, $componentB);
$system1 = new System($componentA, $componentB, $componentC);

var_dump($system1);

class Facade
{
    public static function getSystem(
        ?ComponentA $componentA = null,
        ?ComponentB $componentB = null,
        ?ComponentC $componentC = null
    ): System {
        $componentA = $componentA ?? new ComponentA();
        $componentB = $componentB ?? new ComponentB($componentA);
        $componentC = $componentC ?? new ComponentC($componentA, $componentB);

        return new System($componentA, $componentB, $componentC);
    }
}

// легко создавать
$system2 = Facade::getSystem();
var_dump($system2);

$system3 = Facade::getSystem($componentA, $componentB);
var_dump($system3);