<?php

/**
 * Copyright 2014-2016, SellerLabs <snagshout-devs@sellerlabs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This file is part of the Snagshout package
 */

namespace Presence\Commands;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DatabaseCommand.
 *
 * TODO: Describeme
 *
 * @author Mark Vaughn <mark@roundsphere.com>
 * @package Presence\Commands
 */
class DatabaseCommand extends Command
{

    protected function configure()
    {
        $this->setName('database')
            ->setDescription('Set up the database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        Manager::schema()->create(
            'macs',
            function (Blueprint $table) {
                $table->char('id', 17)->primary();
                $table->string('user', 128)->nullable();
                $table->string('description', 128)->nullable();
                $table->integer('minutes')->default(0);
            }
        );
    }

}
