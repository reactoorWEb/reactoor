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

namespace illustrate\JsonSchema\Parsers\Keywords;

use illustrate\JsonSchema\Keyword;
use illustrate\JsonSchema\Info\SchemaInfo;
use illustrate\JsonSchema\Parsers\{KeywordParser, DataKeywordTrait,
    SchemaParser};
use illustrate\JsonSchema\Keywords\{MinLengthDataKeyword, MinLengthKeyword};

class MinLengthKeywordParser extends KeywordParser
{
    use DataKeywordTrait;

    /**
     * @inheritDoc
     */
    public function type(): string
    {
        return self::TYPE_STRING;
    }

    /**
     * @inheritDoc
     */
    public function parse(SchemaInfo $info, SchemaParser $parser, object $shared): ?Keyword
    {
        $schema = $info->data();

        if (!$this->keywordExists($schema)) {
            return null;
        }

        $value = $this->keywordValue($schema);

        if ($this->isDataKeywordAllowed($parser, $this->keyword)) {
            if ($pointer = $this->getDataKeywordPointer($value)) {
                return new MinLengthDataKeyword($pointer);
            }
        }

        if (!is_int($value) || $value < 0) {
            throw $this->keywordException("{keyword} must be a non-negative integer", $info);
        }

        if ($value === 0) {
            return null;
        }

        return new MinLengthKeyword($value);
    }
}