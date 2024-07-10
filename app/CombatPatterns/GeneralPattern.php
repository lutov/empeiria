<?php


namespace App\CombatPatterns;


use App\Models\Characters\Character;
use App\Models\Characters\Skill;

class GeneralPattern
{
    public CombatState $combatState;
    public CharacterState $characterState;

    public Character $self;

    public bool $nearDeath;
    public bool $wounded;
    public bool $healthy;

    public bool $canAttack;
    public bool $canUseSkill;
    public bool $canMove;

    public Character | InteractiveObject $target;
    public Skill $activeSkill;

    /**
     * GeneralPattern constructor.
     * @param CombatState $combatState
     * @param CharacterState $characterState
     */
    public function __construct(CombatState $combatState, CharacterState $characterState)
    {
        $this->combatState = $combatState;
        $this->characterState = $characterState;
        $this->self = Character::find($characterState->id);
    }

    public function action()
    {
        if($this->nearDeath) {
            if($this->canUseSkill) {
                $this->activeSkill = Skill::where('slug', '=',  'heal')->first();
                $this->useSkill($this->activeSkill, $this->self);
            } else if($this->canMove) {
                $this->target = $this->getExit();
                $this->moveTo($this->target);
            }
        } else if($this->wounded) {
            if($this->canUseSkill) {
                $this->activeSkill = Skill::where('slug', '=',  'heal')->first();
                $this->useSkill($this->activeSkill, $this->self);
            }
        }

        if($this->canAttack) {
            $this->target = $this->getClosestEnemy();
            $this->attack($this->target);
        } else if($this->canUseSkill) {
            $this->target = $this->getClosestEnemy();
            $this->activeSkill = Skill::where('slug', '=',  'powerful_attack')->first();
            $this->useSkill($this->activeSkill, $this->target);
        } else if($this->canMove) {
            $this->target = $this->getClosestEnemy();
            $this->moveTo($this->target);
        }
    }

    private function useSkill(Skill $skill, $target)
    {

    }

    private function moveTo($target)
    {

    }

    private function getClosestEnemy()
    {
        $enemy = new Character();
        return $enemy;
    }

    private function getExit()
    {
        $interactiveObject = new InteractiveObject();
        return $interactiveObject;
    }

    private function attack($target)
    {

    }
}
