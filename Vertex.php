<?php
class Vertex{
    public $name;
    public $visited;
    public $mindistance = INF;
    public $previous;
    public $edges;

    public function __construct($name) {
        $this->name = $name;
        $this->edges = array();
    }

    public function addEdge($edge){
        array_push($this->edges, $edge);
    }

    public function getMindistance()
    {
        return $this->mindistance;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function getEdges()
    {
        return $this->edges;
    }

    public function setPrevious($previous)
    {
        $this->previous = $previous;
    }

    public function setMindistance($mindistance)
    {
        $this->mindistance = $mindistance;
    }

    public function getVisited()
    {
        return $this->visited;
    }

    public function setVisited($visited)
    {
        $this->visited = $visited;
    }

    function toString(){
        return $this->name;
    }
}
