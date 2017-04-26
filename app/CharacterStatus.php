<?php

namespace App;

class CharacterStatus
{
    private $character;

    public function __construct($character)
    {
        $this->character = $character;
    }

    public function toString()
    {
        if (is_null($this->character->status)) {
            return 'Not Checked';
        } else {
            return ucfirst(strtolower($this->character->status));
        }
    }

    public function labelColor()
    {
        if (is_null($this->character->status)) {
            return 'label-warning';
        }

        switch ($this->character->status) {
            case 'accepted':
                return 'label-success';
                break;
            case 'rejected':
                return 'label-danger';
                break;
            default:
                return 'label-default';
                break;
        }
    }
}
