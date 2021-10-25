<?php

namespace App\Command;

use App\Message\ParserQueueMessage;
use App\Service\FileStorage;
use App\Service\MemcachedStorage;
use App\Service\ReaderRedisStorage;
use Predis\Client;
use Sip\ReaderManager\Interfaces\ReaderStorageInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class ParserCommand extends Command
{
    protected static $defaultName = 'app:parser';
    protected static $defaultDescription = 'Image parser';
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus, string $name = null)
    {
        $this->bus = $bus;
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'url')
            ->addArgument('deep', InputArgument::OPTIONAL, 'deep')
            ->addArgument('max-page', InputArgument::OPTIONAL, 'max-page')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $storage = self::getStorage();
        $storage->clear();

        $io = new SymfonyStyle($input, $output);
        $url = $input->getArgument('url');
        $maxDeep = $input->getArgument('deep') ;
        $maxPage = $input->getArgument('max-page');

        if (empty($maxDeep)) {
            $maxDeep = 3;
        }

        if (empty($maxPage)) {
            $maxPage = 10;
        }

        $this->bus->dispatch(new ParserQueueMessage(
            $url,
            1,
            $maxDeep,
            $maxPage
        ));

        return Command::SUCCESS;
    }

    public static function getStorage(): ReaderStorageInterface
    {
        return new MemcachedStorage('data_storage');
    }
}
