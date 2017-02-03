<?php
/**
 * Created by PhpStorm.
 * User: fabsolutely
 * Date: 03/02/2017
 * Time: 14:34
 */

namespace Fabs\CouchDB2\Query\Queries;


use Fabs\CouchDB2\Query\QueryBase;
use Fabs\CouchDB2\Query\QueryMethods;
use Fabs\CouchDB2\Query\QueryStatusCodes;

class UUIDsQuery extends QueryBase
{

    public function __construct($couch_object, $count)
    {
        $this->allowed_response_codes = [QueryStatusCodes::SUCCESS];
        $this->query_method = QueryMethods::GET;
        $this->query_url = '_uuids';
        parent::__construct($couch_object);
        $this->set_count($count);
    }

    public function set_count($count)
    {
        if ($count < 1) {
            throw new \InvalidArgumentException('count should be greater than 0');
        }
        return $this->set_query_params('count', $count, 'int');
    }
}