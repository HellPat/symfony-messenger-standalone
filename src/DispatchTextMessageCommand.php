<?php

declare(strict_types=1);

namespace Hellpat;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

final class DispatchTextMessageCommand extends Command
{
    protected static $defaultName = 'dispatch:message';

    public function __construct(
        private MessageBusInterface $messageBus
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('message', InputArgument::REQUIRED, 'The message you want to send')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $textMessage = new TextMessage($input->getArgument('message'));

        $this->messageBus->dispatch($textMessage);

        $io = new SymfonyStyle($input, $output);
        $io->success(sprintf('Sent message: "%s"', $textMessage->message));

        return Command::SUCCESS;
    }
}