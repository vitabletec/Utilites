<?php

namespace stuff;

/**
 * Utilities is class which help you to debug and
 * common daily uses required function.
 * We have create a function as similar to php just add "s" in every function name s is stand for stuff
 * it will help us to no need to remember function of this class
 * just add add write php function start with s
 * 
 * @author Mayank singh kushwah
 * @email <msrajawat298@gmail.com>
 * website : www.mayanksinghkushwah.in
 */
class Utilities
{
    /**
     * @param string $url
     * @param bool $baseUrl
     * This function will redirect page
     */
    public static function showPage($url = '')
    {
        if (empty($url)) return false;

        header("location: " . $url);
    }


    /**
     * print_r
     *
     * @param string $data
     * @param mixed $exit=true
     * this function is used for debug 
     * The code prints out the name of the file, line number and then prints a pre tag.
     */
    public static function sprint($data = '', $exit = true)
    {
        echo '<br>MAYANK ' . basename(__FILE__) . ' ' . __LINE__ . '<pre> data :: ';
        print_r($data);
        echo '</pre>';
        if ($exit) exit;
    }

    /**
     * die
     * The code attempts to die() the script with a message of "File" name and Line Number.
     */
    public static function sdie()
    {
        die(basename(__FILE__) . ":" . __LINE__);
    }


    /**
     * whereFunctionExist
     *
     * @param string $function_name
     * The code is trying to find a function is exist it will return file name and line number.
     *  If the function does not exist, it will return false.
     */
    public static function whereFunctionExist($function_name = '')
    {
        if (empty($function_name) ||  !function_exists($function_name)) self::sprint("Function not found");

        $reflFunc = new \ReflectionFunction($function_name);
        echo "Function found at this file " . $reflFunc->getFileName() . ' : ' . $reflFunc->getStartLine();
    }

    /**
     * sdebug_backtrace
     * The code is a function called sdebug_backtrace() that prints out the backtrace of the current file.
     */
    public static function sdebug_backtrace(){
        echo '<br>MAYANK '.basename(__FILE__).' '.__LINE__.'<pre> debug_backtrace :: '; print_r(debug_backtrace()); echo '</pre>'; exit;
    }

    /**
     * sfopen
     *
     * @param mixed $filePath=''
     * @param mixed $writedata=''
     * The code opens a file called custom_log.log and writes the string "print_r($writedata,true)" to it.
     * The purpose is to write all of the data from a variable called $writedata into a file called custom_log.
     */
    public static function sfopen($filePath='',$writedata=''){
        $print_file = fopen($filePath.'custom_log.log','a');
        fwrite($print_file,print_r($writedata,true));
    }


    /**
     * sCount
     *
     * @param mixed $value=''
     * In php 8.1 if value is not countable and we only use count function
     * or in other if value is not countable and we use count function it will fire fatal error
     * so this the solution using we can prevent the error or crash the page.
     * @return  If the value is not countable, it will return 0.
     */
    public static function sCount($value=''){
       if(is_countable($value)) return count($value);
       return 0;
    }
}
