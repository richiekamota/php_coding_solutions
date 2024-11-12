<?php

function isBinaryTree($edges) {
    // If there's only one edge, it cannot form a valid binary tree.
    if (count($edges) < 2) {
        return "not a binary tree";
    }

    // Arrays to store relationships and degrees of nodes
    $childToParent = [];
    $parents = [];
    $degree = [];

    // Iterate through each edge in the input array
    foreach ($edges as $edge) {
        // Extract nodes using regular expression
        preg_match_all('/\d+/', $edge, $matches);

        // Check if nodes are successfully extracted
        if (isset($matches[0][0], $matches[0][1])) {
            list($child, $parent) = $matches[0];

            // Check if the child already has a different parent, indicating two parents
            if (isset($parents[$child]) && $parents[$child] !== $parent) {
                return "node with two parents";
            }

            // Record the parent of each child
            $childToParent[$child] = $parent;
            $parents[$child] = $parent;

            // Count the number of children for each parent and check if it exceeds 2
            $degree[$parent] = isset($degree[$parent]) ? $degree[$parent] + 1 : 1;
            if ($degree[$parent] > 2) {
                return "node with three children";
            }
        }
    }

    // Find the number of roots (nodes that are not children of any other nodes)
    $roots = [];
    foreach ($childToParent as $child => $parent) {
        if (!isset($childToParent[$parent])) {
            $roots[$parent] = true;
        }
    }

    // If no root exists or there is more than one root, return "disconnected"
    if (count($roots) != 1) {
        return "disconnected";
    }

    // Check for cycles in the graph
    $visited = [];
    foreach ($childToParent as $child => $parent) {
        $current = $child;
        $path = [];

        // Traverse upward to detect cycles
        while ($current && !in_array($current, $visited)) {
            if (isset($path[$current])) {
                return "cycle";
            }
            $path[$current] = true;
            $visited[] = $current;
            $current = $childToParent[$current] ?? null;
        }
    }

    // If the tree passed all tests, it is valid
    return "ok";
}

// Test cases
$tests = [
    ["(2,1)", "(3,1)", "(4,2)", "(5,2)", "(6,3)", "(7,3)"], // ok
    ["(1,2)", "(2,4)", "(5,7)", "(7,2)", "(9,5)"], // ok
    ["(2,1)", "(3,1)", "(5,4)", "(5,2)"], // node with two parents
    ["(1,2)", "(3,2)", "(2,12)", "(5,2)"],   // node with three children
    ["(2,1)", "(4,3)"],   // disconnected
    ["(1,2)", "(3,4)", "(4,5)", "(5,3)"], // cycle
    ["(1,2)", "(3,4)", "(4,5)"], // disconnected
    ["(1,2)", "(1,3)"],    // node with two parents
    ["(2,1)", "(2,1)"],    // node with two parents
    ["(1,2)", "(2,4)", "(7,2)"],  // ok
    ["(9,3)", "(7,2)", "(1,8)"],   // disconnected
    ["(1,9)", "(5,4)", "(7,2)"],   // disconnected 
    ["(2,1)", "(8,1)"], // ok
    ["(2,1)", "(2,3)"], // node with two parents
    ["(1,2)", "(12,5)"], // disconnected
    ["(1,2)"] // not a binary tree
];

// Run the function for each test
// Run the function for each test case and output the result
foreach ($tests as $test) {
    echo isBinaryTree($test) . PHP_EOL;
}