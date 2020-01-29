<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

class ReadPersonneCommand extends Command
{
    protected static $defaultName = 'readPersonne';

    protected function configure()
    {
        $this
            ->setDescription('Permet de lire un fichier Yml et de l\'afficher dans la console')
            ->addArgument('uriFichier', InputArgument::OPTIONAL, 'Uri du ')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $uri = $input->getArgument('uriFichier');

        if ($uri){
            $yaml = Yaml::parseFile($uri);
            $io->note(sprintf('Contenue du fichier: %s', Yaml::dump($yaml, 1)));

        }else{
            $io->note(sprintf('Uri invalide'));
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
