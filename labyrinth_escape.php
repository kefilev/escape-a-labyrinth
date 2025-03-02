<?php

declare(strict_types=1);

class LabyrinthEscape {
    private array $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]]; // Up, Down, Left, Right
    
    public function shortestPath(array $map): int {
        $height = count($map);
        $width = count($map[0]);
        
        // BFS (Breadth-First Search)
        $queue = [[0, 0, 1, false]]; //queue: (row, col, steps, wallRemoved)
        $visited = []; //the locations where we already checked
        
        while (!empty($queue)) {
            [$r, $c, $steps, $wallRemoved] = array_shift($queue);
            
            // If reached the exit
            if ($r === $height - 1 && $c === $width - 1) {
                return $steps;
            }
            
            foreach ($this->directions as [$dr, $dc]) {
                $nr = $r + $dr;
                $nc = $c + $dc;
                
                if ($nr >= 0 && $nr < $height && $nc >= 0 && $nc < $width) {
                    $isWall = $map[$nr][$nc] === 1;
                    $stateKey = "$nr,$nc," . ($wallRemoved ? '1' : '0');
                    
                    if (!$isWall && !isset($visited[$stateKey])) {
                        $visited[$stateKey] = true;
                        $queue[] = [$nr, $nc, $steps + 1, $wallRemoved];
                    }
                    
                    if ($isWall && !$wallRemoved) {
                        $visited[$stateKey] = true;
                        $queue[] = [$nr, $nc, $steps + 1, true];
                    }
                }
            }
        }
        
        return -1; // Should never happen due to problem constraints (always solvable)
    }
}


if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    // Example usage:
    $maze1 = [
        [0, 0, 0, 0, 0, 0],
        [1, 1, 1, 1, 1, 0],
        [0, 0, 0, 0, 0, 0],
        [0, 1, 1, 1, 1, 1],
        [0, 1, 1, 1, 1, 1],
        [0, 0, 0, 0, 0, 0],
    ];

    $maze2 = [
        [0, 1, 1, 0],
        [0, 0, 0, 1],
        [1, 1, 0, 0],
        [1, 1, 1, 0],
    ];

    $solver = new LabyrinthEscape();
    echo "Shortest Path (Maze 1): " . $solver->shortestPath($maze1) . "\n";
    echo "Shortest Path (Maze 2): " . $solver->shortestPath($maze2) . "\n";
}
