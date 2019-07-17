<?php

declare(strict_types = 1);

namespace Webassembly;

interface Exports
{
    /**
     * Calls an exported function.
     *
     * An exported function is a function that is exported by the WebAssembly
     * module.
     *
     * The provided arguments are automatically converted to WebAssembly
     * compliant values. If arguments are missing, or if too much arguments
     * are given, an `InvocationException` exception will be thrown. If one
     * argument has a non-compliant type, an `InvocationException` exception
     * will also be thrown.
     *
     * # Examples
     *
     * ```php,ignore
     * $instance = new Webassembly\Instance('my_program.wasm');
     * $value = $instance->exports->sum(1, 2);
     * ```
     */
    public function __call(string $exportedFunctionName, array $arguments);
}
