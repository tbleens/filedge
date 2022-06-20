<?php

namespace App\Traits;

trait EnvSetting
{
    private $envFile;

    public function __construct()
    {
        $this->envFile = app()->environmentFilePath();
    }

    public function setEnvironmentValue(array $values)
    {
        $envFile = $this->envFile;
        $str = file_get_contents($envFile);
        $str .= "\r\n";
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $keyPosition = strpos($str, "$envKey=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                if (is_bool($keyPosition) && $keyPosition === false) {
                    // variable doesnot exist
                    $str .= "$envKey=$envValue";
                    $str .= "\r\n";
                } else {
                    // variable exist
                    $str = str_replace($oldLine, "$envKey=$envValue", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        $str = trim($str);
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }
}
