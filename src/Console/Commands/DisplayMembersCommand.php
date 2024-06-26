<?php

namespace Goldfinch\Taz\Console\Commands;

use Goldfinch\CLISupplier\SupplyHelper;
use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;

#[AsCommand(name: 'display:members')]
class DisplayMembersCommand extends GeneratorCommand
{
    protected static $defaultName = 'display:members';

    protected $description = 'Display existing users from Members table';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $response = SupplyHelper::supply('memberslist');

        if ($response) {
            $table = new Table($output);
            $table->setHeaders(['First name', 'Surname', 'Email', 'Groups'])->setRows($response);
            $table->render();
        }

        return Command::SUCCESS;
    }
}
