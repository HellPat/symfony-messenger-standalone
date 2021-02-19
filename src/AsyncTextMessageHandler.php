<?php

declare(strict_types=1);

namespace Hellpat;


final class AsyncTextMessageHandler
{
    public function __invoke(AsyncTextMessage $textMessage)
    {
        if ($textMessage->willThrowAnException) {
            throw new \RuntimeException('Failed to handle message');
        }

        dump(sprintf('Handled TextMessage "%s"', $textMessage->message));
    }
}