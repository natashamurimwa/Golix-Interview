<?php

class BellmanFord
{
    public $vertices;
    public $edges;
    public $cycles;

    public function __construct($vertices, $edges)
    {
        $this->vertices = $vertices;
        $this->edges = $edges;
        $this->cycles = array();
    }

    public function bellmanFord(Vertex $sourceVertex)
    {
        $sourceVertex->setMindistance(0);

        for ($i = 0; $i < sizeof($this->vertices) - 1; $i++) {
            foreach ($this->edges as $edge) {
                if ($edge->getStart()->getMindistance() == INF) {
                    continue;
                }

                $newDistance = $edge->getStart()->getMindistance() + $edge->getWeight();

                if ($newDistance < $edge->getTarget()->getMindistance()) {
                    $edge->getTarget()->setMindistance($newDistance);
                    $edge->getTarget()->setPrevious($edge->getStart());
                }
            }
        }

        foreach ($this->edges as $edge) {
            if ($edge->getStart()->getMindistance() != INF) {

                if (hasCycle($edge)) {
                    $vertex = $edge->getStart();

                    while ($vertex->toString() != $edge->getTarget()->toString()) {
                        array_push($this->cycles, $vertex);
                        $vertex = $vertex->getPrevious();
                    }

                    array_push($this->cycles, $edge->getTarget());

                    return;
                }
            }
        }
    }

    public function printCycle()
    {
        if (!empty($this->cycles)) {
            echo "opportunity detected\n";
            foreach ($this->cycles as $vertex) {
                echo $vertex->toString() . " \n";
            }
        } else {
            echo "no opportunity";
        }
    }

}

function hasCycle(Edge $edge)
{
    return $edge->getTarget()->getMindistance() > $edge->getStart()->getMindistance() + $edge->getWeight();
}
