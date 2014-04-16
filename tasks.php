<?php

// an example of the task file

task("default", ["compile_coffee", "concatenate"]);

task("compile_coffee", function($coffeeCompiler)
{
    $this->in('app/assets/js')->pipe($coffeeCompiler)->out('public/js');
});

task("concatenate", function($concatenator)
{
    $this->in('public/js')->pipe($concatenator)->out('public/all.js');
});

