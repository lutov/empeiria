<?php
/**
 * Created by PhpStorm.
 * User: lutov
 * Date: 21.12.2019
 * Time: 12:21
 */

namespace App\Models\Events;

use App\Models\Body;
use App\Models\BodyParams;
use App\Models\Characters;
use App\Models\Event;
use App\Models\LastName;
use App\Models\Mind;
use App\Models\MindParams;
use App\Models\Name;
use App\Models\Sex;

class Birth extends Event
{

    /**
     * @var Character
     */
    private $child;

    protected function executeEvent()
    {
        /* PARENTS */
        $mother = $this->participants[0];
        $father = $this->participants[1];

        $sex = (isset($this->conditions['sex'])) ? $this->conditions['sex'] : Sex::random()->slug;

        $child = new Character();

        $nameParams = array(
            'sex' => $sex,
        );
        $child->name = (isset($this->conditions['name'])) ? $this->conditions['name'] : Name::random($nameParams)->name;
        $child->last_name = (isset($this->conditions['last_name'])) ? $this->conditions['last_name'] : LastName::random(
            $nameParams
        )->name;

        $child->save();

        /* BODY */
        $body = new Body();

        $body->age = 0;
        $body->sex = $sex;

        $motherBodyParams = $mother->body->params->toArray();
        $fatherBodyParams = $father->body->params->toArray();
        $bodyParams = BodyParams::getAverage($motherBodyParams, $fatherBodyParams);
        $body->setParams($bodyParams);

        $child->body()->save($body);
        /* BODY */

        /* MIND */
        $mind = new Mind();

        $motherMindParams = $mother->mind->params->toArray();
        $fatherMindParams = $father->mind->params->toArray();
        $mindParams = MindParams::getAverage($motherMindParams, $fatherMindParams);
        $mind->setParams($mindParams);

        $child->mind()->save($mind);
        /* MIND */

        $this->child = $child;
    }

    protected function getConsequences()
    {
        return $this->child;
    }

    protected function getDepiction()
    {
        // TODO: Implement getDepiction() method.
    }

}
