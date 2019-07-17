<?php

declare(strict_types = 1);

namespace Webassembly;

/**
 * Represented a typed array, sometimes called a view, over an array buffer.
 */
interface TypedArray extends ArrayAccess
{
    /**
     * Number of bytes per element in the typed array.
     */
    const /* int */ BYTES_PER_ELEMENT = 1;

    /**
     * Builds a view of an array buffer from a particular offset to the offset
     * plus the length.
     *
     * If the length is too large, a `RuntimeException` will be thrown.
     */
    public function __construct(ArrayBuffer $arrayBuffer, int $offset = 0, int $length = null);

    /**
     * Returns the current offset.
     */
    public function getOffset(): int;

    /**
     * Returns the number of elements in the typed array.
     */
    public function getLength(): int;
}
