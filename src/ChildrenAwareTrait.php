<?php

namespace Dhii\Data;

use Dhii\Validation\Exception\ValidationFailedExceptionInterface;
use Traversable;

/**
 * @since [*next-version*]
 */
trait ChildrenAwareTrait
{
    /**
     * The children, if any.
     *
     * @since [*next-version*]
     *
     * @var array|null
     */
    protected $children;

    /**
     * The children, if any.
     *
     * @since [*next-version*]
     *
     * @return array|Traversable|null
     */
    protected function _getChildren()
    {
        return $this->children;
    }

    /**
     * @param array|Traversable $children The children to add.
     *
     * @return $this
     */
    protected function _addChildren($children)
    {
        foreach ($children as $_idx => $_child) {
            $this->_validateChild($_child);
            $this->_addChild($_child);
        }

        return $this;
    }

    /**
     * Adds a child to this instance.
     *
     * @since [*next-version*]
     *
     * @param mixed $child The child to add.
     *
     * @return $this
     */
    protected function _addChild($child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Throws if child is invalid.
     *
     * @since [*next-version*]
     *
     * @param mixed $child The child to validate.
     *
     * @throws ValidationFailedExceptionInterface if the child is invalid.
     */
    protected function _validateChild($child)
    {
    }
}
