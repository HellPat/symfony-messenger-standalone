<?php

declare(strict_types=1);

namespace Hellpat;


use Psr\Log\LoggerInterface;

final class AsyncTextMessageHandler
{
    public function __construct(private LoggerInterface $logger) {}

    public function __invoke(AsyncTextMessage $textMessage)
    {
        if ($textMessage->willThrowAnException) {
            throw new \RuntimeException('Failed to handle message');
        }

        $this->logger->info('Handled AsyncTextMessage "{message}"', [
            'message' => $textMessage->message,
        ]);
    }
}