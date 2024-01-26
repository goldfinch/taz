<?php

namespace Goldfinch\Taz\Console\Commands;

use LeKoala\Encrypt\EncryptHelper;
use Goldfinch\Taz\Services\InputOutput;
use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'generate:encryption-key')]
class GenerateEncryptionKeyCommand extends GeneratorCommand
{
    protected static $defaultName = 'generate:encryption-key';

    protected $description = 'Generate encryption key (ekoala/silverstripe-encrypt)';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $io = new InputOutput($input, $output);
        $io->display(EncryptHelper::generateKey());

        return Command::SUCCESS;
    }
}
