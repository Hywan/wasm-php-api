<?php

declare(strict_types = 1);

namespace Webassembly;

use Serializable;

interface Module extends Serializable
{
    /**
     * Instructs that the module must be persistent across PHP request
     * executions.
     */
    const PERSISTENT = true;

    /**
     * Instructs that the module must **not** be persistent across PHP request
     * executions.
     */
    const VOLATILE = false;

    /**
     * Compiles WebAssembly bytes from a file into a module.
     *
     * The `$persistence` flag allows to compile the module only once per
     * multiple PHP request executions.
     *
     * When the `$persistence` flag is turned to `self::PERSISTENT`, the given
     * file will be read only once and the module will be compiled only
     * once. The module will be registered as persistent across PHP
     * requests. As a side-effect, if the file content changes, the module
     * will not be re-compiled.
     *
     * To force to compile a new fresh module, the `$persistence` flag must be
     * turned to `self::VOLATILE`, which is the default value.
     *
     * The constructor throws a `RuntimeException` when the given file does
     * not exist, or is not readable.
     *
     * The constructor also throws a `RuntimeException` when the compilation
     * failed.
     */
    public function __construct(string $filePath, bool $persistence);

    /**
     * Instantiates the module.
     *
     * # Examples
     *
     * The following code:
     *
     * ```php,ignore
     * $module = new Webassembly\Module('my_program.wasm');
     * $instance = $module->instantiate();
     * ```
     *
     * is a shortcut to:
     *
     * ```php,ignore
     * $module = new Webassembly\Module('my_program.wasm');
     * $instance = Webassembly\Instance::fromModule($module);
     * ```
     */
    public function instantiate(): Instance;

    /**
     * Serializes this module with the standard `serialize` PHP
     * function. `null` is returned when the serialization failed.
     *
     * # Examples
     *
     * ```php,ignore
     * $module = new Webassembly\Module('my_program.wasm');
     * $serializedModule = serialize($module);
     * ```
     */
    public function serialize(): string;

    /**
     * Deserializes a (supposedly) serialized module, with the standard
     * `unserialize` PHP function.
     *
     * This method throws a `RuntimeException` if the deserialization failed.
     *
     * # Examples
     *
     * ```php,ignore
     * $module = new Webassembly\Module('my_program.wasm');
     * $serializedModule = serialize($module);
     * unset($module);
     *
     * $module = unserialize($serializedModule, [Webassembly\Module::class]);
     * $instance = $module->instantiate();
     * ```
     */
    public function unserialize($serializedModule);
}
