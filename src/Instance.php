<?php

declare(strict_types = 1);

namespace Webassembly;

abstract class Instance
{
    /**
     * Collections of exported symbols.
     *
     * This is a read-only attribute.
     *
     * @var Exports
     */
    public /* Exports  */ $exports = null;

    /**
     * Compiles and instantiates a WebAssembly binary file.
     *
     * The constructor throws a `RuntimeException` when the given file does
     * not exist, or is not readable.
     *
     * The constructor also throws a `RuntimeException` when the compilation
     * or the instantiation failed.
     */
    abstract public function __construct(string $filePath);

    /**
     * Instantiates a WebAssembly module.
     *
     * This method throws a `RuntimeException` when the instantiation failed.
     *
     * # Examples
     *
     * ```php,ignore
     * $module = new Webassembly\Module('my_program.wasm');
     * $instance = Webassembly\Instance::fromModule($module);
     * ```
     */
    abstract public static function fromModule(Module $module): self;

    /**
     * Returns an array buffer over the instance memory if any.
     *
     * # Examples
     *
     * ```php,ignore
     * $instance = new Wasm\Instance('my_program.wasm');
     * $memory = $instance->getMemory();
     * ```
     */
    abstract public function getMemory(): ?Memory;
}
