# Labyrinth Escape Solver

## Description
This PHP script finds the shortest path to escape a labyrinth represented as a grid of `0`s (passable) and `1`s (walls). The exit is at the top-left (0,0) and the entrance at the bottom-right (w-1, h-1). The algorithm allows removing one wall to find the optimal escape route.

## Requirements
- PHP 8.2+

## Installation
1. Clone or download this repository.
2. Ensure PHP is installed and available in your terminal.

## Usage
Run the script using:
```
php labyrinth_escape.php
```

## Example Input & Output
Input matrix:
```
$maze = [
    [0, 1, 1, 0],
    [0, 0, 0, 1],
    [1, 1, 0, 0],
    [1, 1, 1, 0]
];
```
Output:
```
Shortest Path (Maze 1): 7
```

## Running Tests
Run the unit tests with:
```
php labyrinth_escape_test.php
```
Expected output:
```
✔️  Test Case 1 passed
✔️  Test Case 2 passed
✔️  Test Case 3 passed
✔️  Test Case 4 passed
```

## Assumptions & Limitations
- The labyrinth size is between 2x2 and 20x20.
- The start and end points are always `0`.
- The input maze is always solvable.
- Only cardinal moves (up, down, left, right) are allowed.
- One wall can be removed to find an escape route.

## License
This project is open-source and free to use.


# Breadth-First Search (BFS) Explained

**Breadth-First Search (BFS)** is an algorithm used to traverse or search through graph-like structures, such as trees, grids, or networks. It explores all possible moves at the current depth level before moving on to the next depth level.

## How BFS Works
1. **Start from the source (root) node.**
2. **Use a queue** (FIFO - First In, First Out) to keep track of nodes that need to be explored.
3. **Visit each node level by level**, adding its unvisited neighbors to the queue.
4. **Repeat until the destination node is found** or all nodes are visited.

## Why Use BFS?
- **Guaranteed shortest path in an unweighted graph** (like our labyrinth escape problem).
- **Systematic exploration**, ensuring no nodes are skipped.
- **Works well for grid-based pathfinding, social network connections, and solving puzzles like mazes.**