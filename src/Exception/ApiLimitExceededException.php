<?php

namespace OrgManager\ApiClient\Exception;

/**
 * ApiLimitExceedException.
 *
 * @author Miguel Piedrafita <soy@miguelpiedrafita.com>
 */
class ApiLimitExceedException extends RuntimeException
{
    private $limit;

    public function __construct($limit = 5000, $code = 0, $previous = null)
    {
        $this->limit = (int) $limit;

        parent::__construct('You have reached OrgManager request limit! You will be able to continue making requests in a minute'), $code, $previous);
    }

    public function getLimit()
    {
        return $this->limit;
    }
}
