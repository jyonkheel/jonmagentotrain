<?php
namespace Unit5\Repository\Api\Data;

interface ExampleInterface
{
    public function setId($id);
    public function getId();
    public function getName();
    public function setName($name);
    public function getCreatedAt();
    public function setCreatedAt($createdAt);
    public function getModifiedAt();
    public function setModifiedAt($modifiedAt);
}