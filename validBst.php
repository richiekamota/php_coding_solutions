<?php
// Php program for
// Check if a binary tree is BST or not
//BST stands for Binary Search Tree. It is a binary tree data structure that 
//satisfies the binary search property, which means that the elements in the tree 
//are ordered or sorted in a specific way.
//In a Binary Search Tree:
//Each node has at most two child nodes: a left child and a right child.
//For every node N, 
//all elements in the left subtree of N are less than the value of N, 
//and all elements in the right subtree of N are greater than the value of N.
//This property holds for all nodes in the tree, not just the root node.
//Binary Search Trees are commonly used for efficient searching, insertion, and deletion of elements. 
//When elements are inserted into or deleted from a BST, the tree is restructured to maintain the binary search property.
//The time complexity for searching, inserting, and deleting elements in a balanced BST is typically O(log n),
//where n is the number of elements in the tree. However, in the worst-case scenario, when the tree becomes unbalanced, the time complexity may degrade to O(n), where n is the number of elements in the tree. Therefore, maintaining balance in a BST is important for efficient operations.

class TreeNode
{
	public $data;
	public $left;
	public $right;
	public function __construct($data)
	{
		$this->data = $data;
		$this->left = NULL;
		$this->right = NULL;
	}
}

class BinaryTree
{
	public $root;
	public function __construct()
	{
		$this->root = NULL;
	}
	public function isBst($node, $l, $r)
	{
		if ($node != NULL)
		{
			if ($l != NULL && $l->data > $node->data || 
                $r != NULL && $r->data < $node->data)
			{
				// When parent node are not form of binary tree
				return false;
			}
			return ($this->isBst($node->left, $l, $node) && 
                    $this->isBst($node->right, $node, $r));
		}
		return true;
	}
	// Display tree elements in order form
	public	function inorder($node)
	{
		if ($node != NULL)
		{
            $this->inorder($node->left);
			// Print node value
			echo "$node->data";
			$this->inorder($node->right);
		}
	}
	public static function main()
	{
		$tree = new BinaryTree();
		/*
		  Binary Tree
		  ---------------
		          15
		          / \
		         /   \
		        10   24
		       /    /  \
		      9    16   30
		*/
		// Add tree node
		$tree->root = new TreeNode(15);
		$tree->root->left = new TreeNode(10);
		$tree->root->right = new TreeNode(24);
		// $tree->root->right->right = new TreeNode(30);
		// $tree->root->right->left = new TreeNode(16);
		// $tree->root->left->left = new TreeNode(15);
		// Display Tree elements
		$tree->inorder($tree->root);
		if ($tree->isBst($tree->root, NULL, NULL))
		{
			echo "\n  Yes \n";
		}
		else
		{
			echo "\n  No \n";
		}
		/*
		  Add new node 25 in binary tree
		  -----------------------
		      15
		      / \
		     /   \
		    10   24
		   /    /  \
		  9    16   30
		         \
		          25
		*/
		//$tree->root->right->left->right = new TreeNode(25);
		//$tree->root->right->left->left = new TreeNode(35);
		// Display Tree elements
		//$tree->inorder($tree->root);
		//if ($tree->isBst($tree->root, NULL, NULL))
		//{
		//	echo "\n  Yes \n";
		//}
		//else
		//{
		//	echo "\n  No \n";
		//}
	}
}
BinaryTree::main();