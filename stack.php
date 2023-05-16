<?php
class Stack {
    private $size = 10;
    private $elements = [];

    public function push(int $value) {
        if (!$this->isFull())
            array_push($this->elements, $value);
        else
            echo "Stack is full!\n";
    }

    public function pop() {
        if (!$this->isEmpty()) {
            $removed_element = end($this->elements);
            array_pop($this->elements);
            return $removed_element;
        }
        else {
            echo "Stack is empty!\n";
            return null;
        }
    }

    public function printStack() {
        echo "Current stack:\n";
        foreach($this->elements as $key => $value)
            echo $value . " ";
        echo "\n";
    }

    private function isEmpty() {
        if (sizeof($this->elements) <= 0)
            return true;
        else
            return false;
    }

    private function isFull() {
        if (sizeof($this->elements) >= $this->getSize())
            return true;
        else
            return false;
    }

    private function getSize() {
        return $this->size;
    }
}

$stack = new Stack();
$exit = false;
while(!$exit) {
    echo "\nSTACK MENU:\n\n";
    echo "1. Push element\n";
    echo "2. Pop element\n";
    echo "3. Print stack\n";
    echo "other key -> exit\n\n";
    $option = readline('Your choice: ');
    system('clear');    //system('cls') for windows
    switch($option) {
        case 1:
            $value = readline('Give the value of the new element: ');
            $stack->push($value);
            break;
        case 2:
            $removed_element = $stack->pop();
            if ($removed_element != null)
                echo "Deleted element: ". $removed_element;
            break;
        case 3:
            $stack->printStack();
            break;
        default:
            $exit = true;
            break;
    }

}
echo "Program finished!\n";
?>