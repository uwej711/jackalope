<?php

namespace Jackalope\Query\QOM;

use PHPCR\Query\QOM\OrInterface;
use PHPCR\Query\QOM\ConstraintInterface;

/**
 * {@inheritDoc}
 *
 * @api
 */
class OrConstraint implements OrInterface
{
    /**
     * @var \PHPCR\Query\QOM\ConstraintInterface
     */
    protected $constraint1;

    /**
     * @var \PHPCR\Query\QOM\ConstraintInterface
     */
    protected $constraint2;

    /**
     * Constructor
     *
     * @param ConstraintInterface $constraint1
     * @param ConstraintInterface $constraint2
     */
    public function __construct(ConstraintInterface $constraint1, ConstraintInterface $constraint2)
    {
        $this->constraint1 = $constraint1;
        $this->constraint2 = $constraint2;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     */
    function getConstraint1()
    {
        return $this->constraint1;
    }

    function getConstraints() {
        $constraints = array_merge($this->getConstraint1()->getConstraints(), $this->getConstraint2()->getConstraints());
        $constraints[] = $this;
        return $constraints;
    }
    /**
     * {@inheritDoc}
     *
     * @api
     */
    function getConstraint2()
    {
        return $this->constraint2;
    }
}
