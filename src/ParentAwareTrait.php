<?php

namespace Dhii\Data;

use Dhii\Validation\Exception\ValidationFailedExceptionInterface;

/**
 * Common functionality for maintaining a parent.
 *
 * @since [*next-version*]
 */
trait ParentAwareTrait
{
    /**
     * The parent, if any.
     *
     * @since [*next-version*]
     *
     * @var mixed|null
     */
    protected $parent;

    /**
     * Retrieves the parent of this instance.
     *
     * @since [*next-version*]
     *
     * @return mixed|null
     */
    protected function _getParent()
    {
        return $this->parent;
    }

    /**
     * Assigns the parent of this instance.
     *
     * @since [*next-version*]
     *
     * @param mixed $parent
     */
    protected function _setParent($parent)
    {
        $this->_validateParent($parent);
        $this->parent = $parent;

        return $this;
    }

    /**
     * Throws an exception if the argument is not a valid parent node.
     *
     * @since [*next-version*]
     *
     * @throws ValidationFailedExceptionInterface If parent invalid.
     */
    protected function _validateParent($parent)
    {
    }
}
