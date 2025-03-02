<?php

declare(strict_types=1);

require_once 'labyrinth_escape.php';

class LabyrinthEscapeTest {
    public function runTests(): void {
        $this->testShortestPath();
    }

    private function assertEqual($expected, $actual, $testName): void {
        if ($expected === $actual) {
            echo "✔️  $testName passed\n";
        } else {
            echo "❌  $testName failed: Expected $expected, got $actual\n";
        }
    }

    private function testShortestPath(): void {
        $solver = new LabyrinthEscape();

        $maze1 = [
            [0, 0, 0, 0, 0, 0],
            [1, 1, 1, 1, 1, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 1, 1, 1, 1, 1],
            [0, 1, 1, 1, 1, 1],
            [0, 0, 0, 0, 0, 0],
        ];
        $this->assertEqual(11, $solver->shortestPath($maze1), "Test Case 1");

        $maze2 = [
            [0, 1, 1, 0],
            [0, 0, 0, 1],
            [1, 1, 0, 0],
            [1, 1, 1, 0],
        ];
        $this->assertEqual(7, $solver->shortestPath($maze2), "Test Case 2");

        $maze3 = [
            [0, 0],
            [0, 0],
        ];
        $this->assertEqual(3, $solver->shortestPath($maze3), "Test Case 3");

        $maze4 = [
            [0, 1, 0],
            [0, 1, 0],
            [0, 0, 0],
        ];
        $this->assertEqual(5, $solver->shortestPath($maze4), "Test Case 4");
    }
}

// Run the tests
$test = new LabyrinthEscapeTest();
$test->runTests();
