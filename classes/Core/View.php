<?php

namespace Core;

class View
{
    function generate($content_view, $template_view, $data=null, $params=null)
    {
        include_once 'classes/Views/' . $template_view;
    }
}
