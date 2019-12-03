<?php
include __DIR__.'/DiscordApp.php';
class System
{
    /*Basic information questions */
    public $position;
    public $name;
    public $email;
    public $age;
    public $discordTag;
    public $gameTag;
    public $id;

    public function __construct()
    {
        $this->id = $this->getRandomID();
    }

    private $questions = [
        'experience_id' => null,
        'comparison_id' => null,
        'problem_id' => null,
        'extra_id' => null
    ];

    public function setExperience(string $text): void
    {
        if(strlen($text) > 0 && $text !== null)
        {
            $this->questions['experience_id'] = $text; 
        } else {
            $this->questions['experience_id'] = 'He do not answer';
        }
    }

    public function setComparison(string $text): void
    {
        if(strlen($text) >= 0 && $text !== null)
        {
            $this->questions['comparison_id'] = $text;
        } else {
            $this->questions['comparison_id'] = 'He do not answer';
        }
    }

    public function setProblemSolution(string $text): void
    {
        if(strlen($text) > 0 && $text !== null)
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

    private function getRandomID(): string
    {
        $id = '';
        $abc = ['a','b','c','d','e','f','g','h','i','j','k','l','m','s','t','p','q','r','s','t','o','w','x','y','z','n'];
        $numbers = ['1','2','3','4','5','6','7','8','9','0'];
        for($i = 0; $i < 20; $i++)
        {
            $random = ['abc','num'];
            $key = $random[array_rand($random)];
            if($key === 'abc')
            {
                $id .= $abc[array_rand($abc)];
            }

            if($key === 'num')
            {
                $id .= $numbers[array_rand($numbers)];
            }

        }
        return $id;
    }

    private function getBaseName(string $id): string
    {
        switch($id)
        {
            case 'developer':
                return 'Developer';
            break;
            case 'builder':
                return 'Builder';
            break;
            case 'trinee':
                return 'Trainee';
            break;
            case 'discordmod':
                return 'Discord Moderator';
            break;
        }
        return '';
    }

    public function send(): void
    {
        $packet = new DiscordApp();
        $packet->hook = "https://discordapp.com/api/webhooks/651194542674018334/6j3kQq0SG6JM1-9be3k1mcvTbbvDVlLC8V_szD7ZsPKlrOjs00C9ZRucX-rWqqTtIfO-";
        $packet->title = $this->getBaseName($this->position).' Apply';
        $br = "\n";
        $name = 'Name: '.$this->name.$br;
        $mail = 'Mail: '.$this->email.$br;
        $age = 'Age: '.$this->age.$br;
        $id = 'ID: '.$this->id;
        $gameTag = 'In Game Tag: '.$this->gameTag.$br;
        $discordTag = 'Discord User: '.$this->discordTag.$br;
        $clock = date('d/m/Y');

        $question1 = ['Answer: '.$this->questions['experience_id'].$br.$br,'1- Tell us in detail your experience in the selected field.'.$br];
        $question2 = ['Answer: '.$this->questions['comparison_id'].$br.$br,'2- Show why we should choose you before others. Do not limit yourself.'.$br];
        $question3 = ['Answer: '.$this->questions['problem_id'].$br.$br,'3- There is a conflict between you and other staff, how would you solve this?'.$br];
        $question4 = ['Answer: '.$this->questions['extra_id'].$br.$br,'4- Anything else to say? If you can, leave descriptions of your old works or links that demonstrate your good work.'.$br];

        $footer = 'If the application is good and you are interested in it, send the ID of the apply to the #discussion channel.'.$br.'-[==========['.$clock.']==========]-';

        $packet->message = 'Basic information:'.$br.$name.$mail.$age.$gameTag.$discordTag.$br.$question1[1].$question1[0].$question2[1].$question2[0].$question3[1].$question3[0].$question4[1].$question4[0].$br.$id.$br.$br.$footer.$br;
        $packet->sendPacket();
    }

}