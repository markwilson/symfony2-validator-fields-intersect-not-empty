# Symfony2 Validation fields intersect not empty constraint

Note: currently only works for validator component 2.2.x

Constraint to check if an array contains at least one of the provided keys.

## Install

Add `markwilson/symfony2-validator-fields-intersect-not-empty` to composer.json requires.

## Usage

`FieldsIntersectNotEmpty` requires a `fields` option which takes an array of keys to search in the validating value.

e.g.

```` php
use MarkWilson\Validator\Constraints\FieldsIntersectNotEmpty;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

$constraint = new FieldsIntersectNotEmpty(array('one', 'of', 'these', 'must', 'exist');

$validator = Validation::createValidator();

$value = array('nothing' => true, 'matches' => true);
$validator->validateValue($value, $constraint); // invalid

$value = array('exist' => true, 'matches' => true);
$validator->validateValue($value, $constraint); // valid
````
