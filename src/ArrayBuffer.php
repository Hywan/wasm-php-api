<?php

declare(strict_types = 1);

namespace Webassembly;

interface ArrayBuffer
{
    /**
     * Constructs an array buffer initialized with zeros.
     */
    public function __construct(int $numberOfPages, int $maximumNumberOfPages = null);

    /**
     * Returns the length of the array buffer in bytes.
     */
    public function getByteLength(): int;

    /**
     * Extends the size of the array buffer by a number of pages (of
     * `Webassembly\PAGE_SIZE` each).
     */
    public function grow(int $numberOfPages): void;
}
