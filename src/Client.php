<?php
/**
 * MIT License
 *
 * Copyright (c) 2017 Bitcoin Vietnam
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

namespace BitcoinVietnam\TwentyoneBitcoinfees;

use BitcoinVietnam\TwentyoneBitcoinfees\Response;
use BitcoinVietnam\TwentyoneBitcoinfees\Utils;

/**
 * Class Client
 *
 * @package BitcoinVietnam\TwentyoneBitcoinfees
 */
class Client
{
    const BASE_URL = 'https://bitcoinfees.21.co/api/v1';

    /**
     * @var array
     */
    private $factory = [];

    /**
     * @return Response\Get\FeesList
     */
    public function getFeesList()
    {
        return $this->utils()->serializer()->deserialize(
            $this->utils()->guzzle()->get(self::BASE_URL . '/fees/list')->getBody()->getContents(),
            Response\Get\FeesList::class,
            'json'
        );
    }

    /**
     * @return Response\Get\FeesRecommended
     */
    public function getFeesRecommended()
    {
        return $this->utils()->serializer()->deserialize(
            $this->utils()->guzzle()->get(self::BASE_URL . '/fees/recommended')->getBody()->getContents(),
            Response\Get\FeesRecommended::class,
            'json'
        );
    }

    /**
     * @return Utils\Manager
     */
    private function utils()
    {
        return isset($this->factory[__FUNCTION__]) ? $this->factory[__FUNCTION__] : ($this->factory[__FUNCTION__] = new Utils\Manager());
    }
}