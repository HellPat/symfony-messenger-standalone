<?php

declare(strict_types=1);

namespace Hellpat;


use Psr\Log\LoggerInterface;

final class SyncTextMessageHandler
{
    public function __construct(private LoggerInterface $logger) {}

    public function __invoke(SyncTextMessage $textMessage)
    {
        $this->logger->info('Handled SyncTextMessage "{message}"', [
            'message' => $textMessage->message,
        ]);
    }
}