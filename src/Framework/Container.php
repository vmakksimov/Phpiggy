<?php

declare(strict_types= 1);


namespace Framework;
use ReflectionClass, ReflectionNamedType;
use Framework\Exceptions\ContainerExceptions;

class Container {
    public array $definitions = [];
    private array $resolved = [];

    public function addDefinitions(array $newDefinitions){

        $this->definitions = [...$this->definitions, ...$newDefinitions];
       
    }

    public function resolve(string $classname){
        $reflectionClass = new ReflectionClass($classname);

        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerExceptions("Class {$classname} is not instaintiable.");
        }

        $constructor = $reflectionClass->getConstructor();

        if (!$constructor){
            return new $classname;
        }

        $params = $constructor->getParameters();

        if (count($params) === 0) {
            return new $classname;
        }

        $dependecies = [];

        foreach ($params as $param){
            $name = $param->getname();
            $type = $param->getType();

            if ($type === null) {
                throw new ContainerExceptions("Failed to resolve {$classname} because param {$name} is missing type hint.");
            }

            if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new ContainerExceptions("Failed to resolve {$classname} because of invalid param name.");
            }

            $dependecies[] = $this->get($type->getName());
        }

        return $reflectionClass->newInstanceArgs($dependecies);
    }
    public function get(string $id){
        if (!array_key_exists($id, $this->definitions)) {
            throw new ContainerExceptions("Class {$id} does not exists in the cointainer.");
        }

        if (array_key_exists($id, $this->resolved)){
            return $this->resolved[$id];
        }

        $factory = $this->definitions[$id]; 
        $dependency = $factory();

        $this->resolved[$id] = $dependency;

        return $dependency;
    }
}