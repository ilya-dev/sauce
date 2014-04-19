<?php

// an example of the task file

task("default", ["copy", "concat"]);

task("copy", function($copy)
{
    $this->in('app/assets/js')->pipe($copy())->out('public/js');
});

task("concat", function($concat)
{
    $this->in('public/js')->pipe($concat())->out('public/all.js');
});

