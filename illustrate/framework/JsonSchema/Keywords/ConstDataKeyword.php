<?php
/* ============================================================================
 * Copyright 2020 Zindex Software
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

namespace illustrate\JsonSchema\Keywords;

use illustrate\JsonSchema\{ValidationContext, Schema, JsonPointer};
use illustrate\JsonSchema\Errors\ValidationError;

class ConstDataKeyword extends ConstKeyword
{

    protected JsonPointer $value;

    /**
     * @param JsonPointer $value
     */
    public function __construct(JsonPointer $value)
    {
        $this->value = $value;
        parent::__construct(null);
    }

    /**
     * @inheritDoc
     */
    public function validate(ValidationContext $context, Schema $schema): ?ValidationError
    {
        $value = $this->value->data($context->rootData(), $context->currentDataPath(), $this);
        if ($value === $this) {
            return $this->error($schema, $context, 'const', 'Invalid $data', [
                'pointer' => (string)$this->value,
            ]);
        }

        $this->const = $value;
        $ret = parent::validate($context, $schema);
        $this->const = null;

        return $ret;
    }
}