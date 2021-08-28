<?php

namespace kyoya0819\ProgressBar;

use Exception;

final class ProgressBar
{
    private int $width;
    private int $info_max_length;
    private string $char;


    /**
     * ProgressBar constructor.
     *
     * @param int $width
     * @param string $char
     */
    public function __construct(int $width = 50, string $char = "=")
    {
        $this->width = $width;
        $this->info_max_length = 0;
        $this->char = $char;
    }


    /**
     * Update basic information on the progress bar.
     *
     * @param string $variable_name
     * @param string $value
     * @return ProgressBar
     * @throws Exception
     */
    public function update(string $variable_name, string $value): ProgressBar
    {
        $accepts = ['width', 'char'];

        if (!in_array($variable_name, $accepts))
            throw new Exception('The specified variable_name is not found.');

        if ($variable_name === 'width')
            $this->width = (int) $value;

        if ($variable_name === 'char')
            $this->char = $value;

        return $this;
    }


    /**
     * View the progress bar.
     *
     * @param int $done
     * @param int $total
     * @param string $info
     * @return string
     */
    public function view(int $done, int $total, string $info = ""): string
    {
        $percent = round($done / $total * 100);
        $bar = round($this->width * $percent / 100);


        if (mb_strlen($info) > $this->info_max_length)
            $this->info_max_length = mb_strlen($info);


        $percent = str_pad($percent, 3, " ", STR_PAD_LEFT) . '%';
        $progress = str_repeat($this->char, $bar);
        $progress_blank = str_repeat(" ", $this->width - $bar);
        $info_blank = str_repeat(" ", $this->info_max_length - mb_strlen($info));


        return sprintf("%s [%s>%s] %s/%s %s %s\r", $percent, $progress, $progress_blank, $done, $total, $info, $info_blank);
    }
}