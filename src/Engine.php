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

    private $renderer;

    public function __construct(Renderer $renderer)
    {

        $this->renderer = $renderer;
    }

    /**
     * {@inheritDoc}
     */
    public function get($path, array $data = array())
    {

        $rendererOptions = $this->renderer->getOptions();

        //Strip the include paths
        foreach ($rendererOptions['compiler_options']['paths'] as $includePath) {

            $len = strlen($includePath);
            if (strncmp($includePath, $path, $len) === 0)
                $path = substr($path, $len);
        }

        return $this->renderer->render($path, $data);
    }

}