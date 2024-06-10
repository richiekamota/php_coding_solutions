<?php

function isBinaryTree($edges) {
    // Check if there are less than 2 edges, indicating it's not a binary tree
    if (count($edges) < 2) {
        return "not a binary tree";
    }

    // Arrays to store relationships and degrees of nodes
    $childToParent = array();
    $parents = array();
    $degree = array();

    // Iterate through each edge in the input array
    foreach ($edges as $edge) {
        // Extract nodes using regular expression
        $nodes = preg_match_all('/\d+/', $edge, $matches);

        // Check if nodes are successfully extracted
        if (isset($matches[0][0], $matches[0][1])) {
            list($child, $parent) = $matches[0];

            // Check if the child already has a different parent, indicating a disconnected tree
            if (isset($parents[$child]) && $parents[$child] !== $parent) {
                return "disconnected";
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

    // This ensures that we check if the current parent has no appearance as a child in any edge.
    // Count the number of roots (nodes without a parent)
    $roots = array();
    foreach ($childToParent as $parent) {
        if (!isset($parents[$parent])) {
            $roots[$parent] = true;
        }
    }

    // Check if any node has 2 parents, indicating a disconnected tree
    if (count($childToParent) < count($edges)) {
        return "node with two parents";
    }

    // Check if all upward paths lead to the same root, indicating no cycles
    $nodes = array();
    $current = 0;

    foreach ($childToParent as $node => $parent) {
        $current++;

        // Traverse upward to find the root while checking for cycles
        while ($node && isset($childToParent[$node]) && !isset($nodes[$node])) {
            $nodes[$node] = $current;
            $node = $childToParent[$node];
        }

        // If a cycle is detected, return "cycle"
        if ($node && isset($nodes[$node]) && $nodes[$node] == $current) {
            return "cycle";
        }
    }

    // Check if there is exactly one root, indicating a valid binary tree
    if (count($roots) === 1) {
        return "ok";
    }

    // If none of the conditions are met, the tree is disconnected
    return "disconnected";
}

// Test cases
$tests = [
    ["(2,1)", "(3,1)", "(4,2)", "(5,2)", "(6,3)", "(7,3)"],
    ["(1,2)","(2,4)","(5,7)","(7,2)","(9,5)"],
    ["(2,1)", "(3,1)", "(5,4)", "(5,2)"],
    ["(1,2)","(3,2)","(2,12)","(5,2)"],
    ["(2,1)", "(4,3)"],
    ["(1,2)", "(3,4)", "(4,5)", "(5,3)"],
    ["(1,2)", "(3,4)", "(4,5)"],
    ["(1,2)","(1,3)"],
    ["(2,1)","(2,1)"],
    ["(1,2)", "(2,4)", "(7,2)"],
    ["(9,3)","(7,2)","(1,8)"],
    ["(1,9)","(5,4)","(7,2)"],
    ["(2,1)","(8,1)"],
    ["(2,1)","(2,3)"],
    ["(1,2)","(12,5)"]
];

// Run the function for each test case and output the result
foreach ($tests as $test) {
    echo isBinaryTree($test) . PHP_EOL;
}
/*
The function takes an array of edges as input, representing relationships between nodes in a tree.
It checks if there are less than 2 edges, in which case it returns "not a binary tree" since a binary tree should have at least one edge.
The function uses three arrays ($childToParent, $parents, $degree) to store relationships and degrees of nodes.
It iterates through each edge, extracts child and parent nodes using a regular expression, and checks for disconnected nodes or nodes with more than two children.
It counts the number of roots (nodes without parents) and checks for nodes with two parents, indicating a disconnected tree.
The function traverses upward for each node to check if all paths lead to the same root, detecting cycles.
Finally, it checks if there is exactly one root, indicating a valid binary tree, or returns "disconnected" if none of the conditions are met.
Explanation:

$nodes is an associative array used to keep track of nodes encountered during traversal. Keys represent nodes, and values represent the traversal order.

$current is a counter that increments with each iteration of the loop, representing the current traversal order.

The foreach loop iterates through each node in the $childToParent array (child-to-parent mapping).

Inside the loop, a while loop traverses upward from the current node to find the root, marking each visited node with the current traversal order. This is done to ensure that the traversal paths of all nodes lead to the same root.

If a cycle is detected (i.e., the current node is already marked with the same traversal order), the function returns "cycle," indicating that there is a cycle in the tree.

In summary, this part of the code ensures that all paths in the tree lead to the same root and detects cycles by checking for repeated nodes in the traversal path. If a cycle is found, it returns "cycle"; otherwise, it proceeds to further checks.

User
What does this do? $node = $childToParent[$node];
ChatGPT
The line $node = $childToParent[$node]; is used to update the current node during the traversal process in the while loop. Let's break down its purpose:

php
Copy code
$node = $childToParent[$node];
Explanation:

$node is the current node being traversed.

$childToParent[$node] retrieves the parent of the current node from the $childToParent mapping.

The value of $node is updated to the parent of the current node.

This line is typically used in a loop where the goal is to traverse upward from a child node to its parent node. In the context of the code snippet you provided, this line is part of the while loop that traverses upward to find the root while checking for cycles.

The loop continues until it reaches the root (where $node becomes null) or encounters a node that has already been visited (isset($nodes[$node])). The traversal involves moving from child to parent until the root is reached or a cycle is detected.

In summary, $node = $childToParent[$node]; is used to update the current node to its parent during the upward traversal process in the while loop.
*/

?>
