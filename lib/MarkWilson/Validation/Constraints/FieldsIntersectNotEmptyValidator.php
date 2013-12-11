<?php

namespace MarkWilson\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Intersection set of the provided fields and the validating value must contain at least one
 *
 * @package MarkWilson\Validation\Constraints
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class FieldsIntersectNotEmptyValidator extends ConstraintValidator
{
    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($value, Constraint $constraint)
    {
        $fields = $constraint->fields;

        $intersection = array_intersect(array_keys($value), $fields);

        if (empty($intersection)) {
            $this->context->addViolation($constraint->message, array('{{ fields }}' => implode(', ', $constraint->fields)));
        }
    }
}
