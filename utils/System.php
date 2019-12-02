<?php
include __DIR__.'/DiscordApp.php';
class System
{
    /*Basic information questions */
    public $position;
    public $name;
    public $email;
    public $age;

    private $questions = [
        'experience_id' => null,
        'comparison_id' => null,
        'problem_id' => null,
        'extra_id' => null
    ];

    public function setExperience(string $text): void
    {
        if(strlen($text) > 500 && $text !== null)
        {
            $this->questions['experience_id'] = $text; 
        } else {
            $this->questions['experience_id'] = 'He do not answer';
        }
    }

    public function setComparison(string $text): void
    {
        if(strlen($text) > 500 && $text !== null)
        {
            $this->questions['comparison_id'] = $text;
        } else {
            $this->questions['comparison_id'] = 'He do not answer';
        }
    }

    public function setProblemSolution(string $text): void
    {
        if(strlen($text) > 500 && $text !== null)
        {
            $this->questions['problem_id'] = $text;
        } else {
            $this->questions['problem_id'] = 'He do not answer';
        }
    }

    public function setExtras(string $text): void
    {
        if(strlen($text) > 0 && $text !== null)
        {
           $this->questions['extra_id'] = $text; 
        } else {
            $this->questions['extra_id'] = 'He do not answer';
        }
    }

}