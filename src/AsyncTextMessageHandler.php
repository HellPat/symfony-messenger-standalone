<?php

declare(strict_types=1);

namespace Hellpat;


final class AsyncTextMessageHandler
{
    public function __invoke(AsyncTextMessage $textMessage)
    {
        dump(sprintf('Handled TextMessage "%s"', $textMessage->message));
    }
}