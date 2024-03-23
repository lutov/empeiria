<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 05.10.2019
 * Time: 14:10
 */

namespace App\Models;

use Illuminate\Support\Collection;

abstract class Event
{

    protected $conditions = array();
    protected $participants;
    protected $depiction = '';

    protected function setConditions(array $conditions)
    {
        $this->conditions = $conditions;
    }

    protected function setParticipants(Collection $participants)
    {
        $this->participants = $participants;
    }

    abstract protected function executeEvent();

    abstract protected function getConsequences();

    /**
     * @return string $this->depiction
     */
    abstract protected function getDepiction();

}
