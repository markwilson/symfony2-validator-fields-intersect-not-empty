<?php

namespace MarkWilson\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

/**
 * Intersection set of the provided fields and the validating value must contain at least one
 *
 * @package MarkWilson\Validation\Constraints
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class FieldsIntersectNotEmpty extends Constraint
{
    /**
     * Constraint message
     *
     * @var string
     */
    public $message = 'Fields must contain one of {{ fields }}';

    /**
     * Array of available keys
     *
     * @var array
     */
    public $fields;

    /**
     * {@inheritDoc}
     */
    public function __construct($options = null)
    {
        if (is_array($options) && !array_intersect(array_keys($options), array('fields'))) {
            $options = array('fields' => $options);
        }

        parent::__construct($options);

        if (!is_array($this->fields)) {
            throw new ConstraintDefinitionException('The option "fields" must be an array in constraint ' . __CLASS__ . '.');
        }

        foreach ($this->fields as $field) {
            if (!is_string($field)) {
                throw new ConstraintDefinitionException('The option "fields" contains an invalid valid array key (' . (string)$field . '), in ' . __CLASS__ . '.');
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getRequiredOptions()
    {
        return array('fields');
    }
}
