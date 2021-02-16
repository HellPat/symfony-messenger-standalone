<?php

declare(strict_types=1);

namespace Hellpat;


final class SyncTextMessageHandler
{
    public function __invoke(SyncTextMessage $textMessage)
    {
        dump(sprintf('Handled TextMessage "%s"', $textMessage->message));
    }
}