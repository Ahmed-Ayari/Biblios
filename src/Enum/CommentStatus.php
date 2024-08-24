<?php

namespace App\Enum;

enum CommentStatus: string
{
    case Pending = 'pending';
    case Published = 'published';
    case Moderated = 'moderated';

    public function getLabel(): string
    {
        return match($this)
        {
            self::Pending => 'en attente',
            self::Published => 'publié',
            self::Moderated => 'modéré'
        };
    }
}