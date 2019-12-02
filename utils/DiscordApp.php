<?php
class DiscordApp
{
    public $hook;
    public $message;
    public $title;

    public function sendPacket(): void
    {
        if($this->isValidMessage() && $this->isValidTitle() && $this->isValidHook())
        {
            $this->message .= "\n [ \@everyone ]";
            
            $handle = [
                'username' => $this->title,
                'content' => $this->message
            ];

            $discord = curl_init($this->hook);
            curl_setopt($discord, CURLOPT_HTTPHEADER, array('content-type: application/json'));
            curl_setopt($discord, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($discord, CURLOPT_POSTFIELDS, json_encode($handle));
            curl_setopt($discord, CURLOPT_RETURNTRANSFER, 1);
            curl_exec($discord);
        }
    }

    private function isValidHook(): bool
    {
        if(strlen($this->hook) > 20 && !is_numeric($this->hook) && $this->hook !== null)
        {
            return true;
        }
        return false;
    }

    private function isValidTitle(): bool
    {
        if(strlen($this->title) > 4 && $this->title !== null && !is_numeric($this->title))
        {
            return true;
        }
        return false;
    }

    private function isValidMessage(): bool
    {
        if(strlen($this->message) > 5 && $this->message !== null)
        {
            return true;
        }
        return false;
    }
}