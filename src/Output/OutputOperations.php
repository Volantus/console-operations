<?php
namespace Volantus\ConsoleOperations\Src\Output;

use Carbon\Carbon;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class OutputOperations
 * @package Volante\SkyBukkit\RelayServer\Src\CLI
 */
trait OutputOperations
{
    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @var boolean
     */
    protected $debugEnabled;

    /**
     * @param string $topic
     * @param string $message
     */
    protected function writeInfoLine(string $topic, string $message)
    {
        $this->output->writeln('[<fg=blue>' . $this->currentTime() . '</>] [<fg=cyan;options=bold>'. $topic . '</>] ' . $message);
    }

    /**
     * @param string $topic
     * @param string $message
     */
    protected function writeDebugLine(string $topic, string $message)
    {
        if ($this->debugEnabled == null) {
            $this->debugEnabled = getenv('OUTPUT_LEVEL') === 'DEBUG';
        }

        if ($this->debugEnabled) {
            $this->output->writeln('[<fg=blue>' . $this->currentTime() . '</>] [<fg=cyan;options=bold>'. $topic . '</>] ' . $message);
        }
    }

    /**
     * @param string $topic
     * @param string $message
     */
    protected function writeGreenLine(string $topic, string $message)
    {
        $this->output->writeln('[<fg=blue>' . $this->currentTime() . '</>] [<fg=cyan;options=bold>'. $topic . '</>] <fg=green>' . $message . '</>');
    }

    /**
     * @param string $topic
     * @param string $message
     */
    protected function writeYellowLine(string $topic, string $message)
    {
        $this->output->writeln('[<fg=blue>' . $this->currentTime() . '</>] [<fg=cyan;options=bold>'. $topic . '</>] <fg=yellow>' . $message . '</>');
    }

    /**
     * @param string $topic
     * @param string $message
     */
    protected function writeRedLine(string $topic, string $message)
    {
        $this->output->writeln('[<fg=blue>' . $this->currentTime() . '</>] [<fg=cyan;options=bold>'. $topic . '</>] <fg=red>' . $message . '</>');
    }

    /**
     * @param string $topic
     * @param string $message
     */
    protected function writeErrorLine(string $topic, string $message)
    {
        $this->output->writeln('[<fg=blue>' . $this->currentTime() . '</>] [<fg=cyan;options=bold>'. $topic . '</>] <error>' . $message . '</error>');
    }

    /**
     * @return string
     */
    protected function currentTime() : string
    {
        return Carbon::now()->format('Y-m-d H:i:s');
    }

    /**
     * @param OutputInterface $output
     */
    public function setOutputInterface(OutputInterface $output)
    {
        $this->output = $output;
    }
}