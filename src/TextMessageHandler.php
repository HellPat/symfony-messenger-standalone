<?php

declare(strict_types=1);

namespace Hellpat;


final class TextMessageHandler
{
    public function __invoke(TextMessage $textMessage)
    {
        dump(sprintf('Handled TextMessage "%s"', $textMessage->message));
    }
}