<?php
namespace Tale\Jade\Bridge\Laravel;

use Illuminate\View\Engines\EngineInterface;
use Tale\Jade\Renderer;

/**
 * A View Engine Wrapper for Jade in Laravel.
 *
 * {@inheritDoc}
 */
class Engine implements EngineInterface
{

    private $_renderer;

    public function __construct(Renderer $renderer)
    {

        $this->_renderer = $renderer;
    }

    /**
     * {@inheritDoc}
     */
    public function get($path, array $data = array())
    {

        $rendererOptions = $this->_renderer->getOptions();

        //Strip the include paths
        foreach ($rendererOptions['compilerOptions']['paths'] as $includePath) {

            $len = strlen($includePath);
            if (strncmp($includePath, $path, $len) === 0)
                $path = substr($path, $len);
        }

        return $this->_renderer->render($path, $data);
    }

}