<?php
namespace Tale\Jade\Bridge\Laravel;

use Illuminate\View\Engines\EngineInterface;
use Tale\Jade\Renderer;

/**
 * Laravel view engine for Jade.
 */
class Engine implements EngineInterface
{

    private $_renderer;

    public function __construct(Renderer $renderer)
    {

        $this->_renderer = $renderer;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function get($path, array $data = array())
    {

        return $this->_renderer->render($path, $data);
    }

}