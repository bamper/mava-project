<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;


class TaskCommand extends ContainerAwareCommand
{
    private $helper;
    private $aTask, $aDesc, $aDate, $aStat;
    private $aUser, $aProject;
    private $aConfirm;

    protected function configure()
    {
        $this
            ->setName('mava:task:create')
            ->setDescription('Create and assign a new task')
            ->addArgument(
                'taskName', InputArgument::REQUIRED,
                'The task name'
            )
            ->addArgument(
                'taskDesc', InputArgument::REQUIRED,
                'The task description'
            )
            ->addArgument(
                'taskDueDate', InputArgument::REQUIRED,
                'The task due date'
            )
            ->addArgument(
                'taskStatus', InputArgument::REQUIRED,
                'The task status'
            )
            ->addOption(
                'user', null, InputOption::VALUE_REQUIRED,
                'If set, the task will be assigned to the user'
            )
            ->addOption(
                'project', null, InputOption::VALUE_REQUIRED,
                'Defines which project this task is belonged to'
            );
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output)
    {
        $util = $this->getContainer()->get('mava_util');
        $result = $util->createTask(
            $input->getArgument('taskName'),
            $input->getArgument('taskDesc'),
            $input->getArgument('taskDueDate'),
            $input->getArgument('taskStatus'),
            $input->getOption('user'),
            $input->getOption('project')
        );
        if ($result){
            $output->writeln("Task created successfully.");
        }

        $this->helper = $this->getHelper('question');
        $this->argQs($input, $output);
        $this->optQs($input, $output);
        $this->confirmQ($input, $output);

        if ($this->aConfirm) {
            $this->createTask()?
                $output->writeln("Task created successfully."):
                $output->writeln("Something went wrong!");
        } else {
            return;
        }
    }

    private function argQs(
        InputInterface $input, OutputInterface $output)
    {
        $helper = $this->helper;
        $qTask = new Question("What is the task name?\n", 'task');
        $this->aTask = $helper->ask($input, $output, $qTask);

        $qDesc = new Question(
            "Please provide a short description:\n",
            'description');
        $this->aDesc = $helper->ask($input, $output, $qDesc);

        $qDate = new Question(
            "What is the due date?\n", '31/12/2017');
        $this->aDate = $helper->ask($input, $output, $qDate);

        $qStat = new ChoiceQuestion(
            "What is the task status?\n",
            ['new', 'in progress', 're opened'],
            0);
        $this->aStat = $helper->ask($input, $output, $qStat);
    }
    private function optQs(InputInterface $input,
                           OutputInterface $output)
    {
        $helper = $this->helper;
        $qUser = new ConfirmationQuestion(
            "Would you like to assign this task to a user? 
            (yes/[no]) ", false);
        if($helper->ask($input, $output, $qUser)) {
            $qUserID = new Question("User ID: \n", '1');
            $this->aUser= $helper->ask($input, $output, $qUserID);
        }
        $qProject = new ConfirmationQuestion(
            "Would you like to set the project for this task?
            (yes/[no]) ", false);
        if($helper->ask($input, $output, $qProject)) {
            $qProjectID = new Question("Project ID: \n", '1');
            $this->aProject=$helper->ask($input,$output,$qProjectID);
        }
    }

    private function confirmQ(
        InputInterface $input, OutputInterface $output)
    {
        $helper = $this->helper;
        $output->writeln(
            "======[ SUMMARY ]======\n".
            " Task name: ".$this->aTask."\n".
            " Description: ".$this->aDesc."\n".
            " Due on: ".$this->aDate."\n".
            " Status: ".$this->aStat."\n".
            " User id: ".$this->aUser."\n".
            " project id: ".$this->aProject
        );
        $qConfirm = new ConfirmationQuestion(
            "\n\n\tDo you confirm the task creation? ([yes]/no) ",
            true);
        $this->aConfirm= $helper->ask($input, $output, $qConfirm);
    }

    private function createTask()
    {
        $util = $this->getContainer()->get('mava_util');
        $result = $util->createTask(
            $this->aTask, $this->aDesc, $this->aDate,
            $this->aStat, $this->aUser, $this->aProject
        );
        return $result;
    }
}
