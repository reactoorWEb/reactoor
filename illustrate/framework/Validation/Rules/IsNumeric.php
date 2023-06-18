<?php
/* ===========================================================================
 * Copyright 2018 Zindex Software
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================================ */

namespace illustrate\Validation\Rules;

use illustrate\Validation\IValidationRule;

class IsNumeric implements IValidationRule
{
    /**
     * @inheritdoc
     */
    public function name(): string
    {
        return 'field:is_numeric';
    }

    /**
     * @inheritdoc
     */
    public function getError(): string
    {
        return '@field must be a number';
    }

    /**
     * @inheritdoc
     */
    public function getFormattedArgs(array $arguments): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function prepareValue($value, array $arguments)
    {
        return $value;
    }

    /**
     * @inheritdoc
     */
    public function validate($value, array $arguments): bool
    {
        return is_numeric($value);
    }
}