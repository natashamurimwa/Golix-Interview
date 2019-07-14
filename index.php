<?php
include "models/Vertex.php";
include "models/Edge.php";
include "models/BellmanFord.php";

$vertices = array();

$vertices[] = new Vertex("USD");
$vertices[] = new Vertex("BOND");
$vertices[] = new Vertex("RTGS");


$edges = array();

//USD exchange rates
$edges[] = new Edge($vertices[0], $vertices[1], -1*log(330));
$edges[] = new Edge($vertices[0], $vertices[2], -1*log(400));

//Bond exchange rates
$edges[] = new Edge($vertices[1], $vertices[0], -1*log(330));
$edges[] = new Edge($vertices[1], $vertices[2], -1*log(115));

//RTGS exchange rates
$edges[] = new Edge($vertices[2], $vertices[0], -1*log(400));
$edges[] = new Edge($vertices[2], $vertices[1], -1*log(115));

$calculator = new BellmanFord($vertices, $edges);
$calculator->bellmanFord($vertices[0]);
$calculator->printCycle();