<?php 
  
  class Node {
    public $value;
    public $next;
    public $previous;
    
    public function __construct($valueIn) {
      $this->value=$valueIn;
    }
  }

  class Listlist{
    public $head;
    public $tail;
  
    public function addNodeHead($valueIn) {
        $node = new Node($valueIn);
      if($this->head == null) {
        $this->head = $node;
      } else {
        $this->head->previous = $node;
        $node->next = $this->head;
        $this->head = $node;     
      }
      
      if($this->tail == null) {
          $this->tail = $node;
      } 
  }


    public function addNodeTail($valueIn){
      $node = new Node($valueIn);
      if($this->tail == null) {
        $this->tail = $node;
      } else {
        $this->tail->next = $node;
        $node->previous = $this->tail;
        $this->tail = $node;
      }
      if($this->head == null) {
        $this->head = $node;
      }
    } 


    public function addNodeBeforeValueFromHead($valueIn, $valueEquals) {
      $node = new Node($valueIn);
      if($this->head == null) {
        $this->head = $node;
        if($this->tail == null) {
          $this->tail = $node;
      } 
      } else {
        if($this->head->value == $valueEquals) {
            $this->head->previous = $node;
            $node->next = $this->head;
            $this->head = $node;     
          } else {
            $runner = $this->head;

            while($runner->value != $valueEquals && $runner->next != null) {
              $runner = $runner->next;
          }

          if($runner->value == $valueEquals) {
            $node->next = $runner;
            $node->previous = $runner->previous;
            $runner->previous->next = $node;
            $runner->previous = $node;
          } else if($runner->value == null) {
            echo "Value inputed does not exist in the list";
          }
        }
      }  
    }

    public function destoryNode($valueEquals) {
      if($this->head == null && $this->tail == null) {
        echo "There is no item in the list";
      } else {
        $runner = $this->head;

        while($runner->value != $valueEquals && $runner->next != null) {
          $runner = $runner->next;
        }
     
        if($runner->value == $valueEquals) {
          $runner->previous->next = $runner->next;
          $runner->next->previous = $runner->previous;
          unset($runner);
        } else if($runner->value == null) {
          echo "Value inputed does not exist in the list";
        }
      }
    }  

    public function display() {
      if($this->head != null) {
        $runner = $this->head;
        while ($runner != null){
          echo $runner->value.'</br>';
          $runner = $runner->next;
        }
      }
    }


  }


  $spaceStation = new Listlist();
  $spaceStation->addNodeHead(1);
  $spaceStation->addNodeHead(3);
  $spaceStation->addNodeTail(10);
  $spaceStation->addNodeTail(11);
  $spaceStation->addNodeBeforeValueFromHead(14,3);
  $spaceStation->addNodeBeforeValueFromHead(15,10);

  var_dump($spaceStation->head);
  var_dump($spaceStation->tail);
  $spaceStation->display();

  $spaceStation->destoryNode(15);
  
  var_dump($spaceStation->head);
  var_dump($spaceStation->tail);
  $spaceStation->display();

?>