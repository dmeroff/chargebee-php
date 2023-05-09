<?php

class ChargeBee_ListResult implements Countable, ArrayAccess, Iterator
{

	private $response;

  private $nextOffset;

	protected $_items;
	
	private $_index;
	
  function __construct($response, $nextOffset)
  {
		$this->response = $response;
		$this->nextOffset = $nextOffset;
    $this->_items = array();
    $this->_initItems();
  }
	
	private function _initItems()
	{
		foreach($this->response as $r)
		{
			array_push($this->_items, new ChargeBee_Result($r));
		}
	}  
	
	public function nextOffset()
	{
	  return $this->nextOffset;
	}
	
    public function count(): int
    {
		return count($this->_items);
	}
	
	//Implementation for ArrayAccess functions
    public function offsetSet($k, $v): void
    {
    $this->$k = $v;
  }

  public function offsetExists($k): bool
  {
    return isset($this->$k);
  }

  public function offsetUnset($k): void
  {
    unset($this->$k);
  }

  public function offsetGet($k): mixed
  {
    return isset($this->list[$k]) ? $this->list[$k] : null;
  }

  //Implementation for Iterator functions
  public function current(): mixed
  {
      return $this->_items[$this->_index];
  }

  public function key(): mixed
  {
      return $this->_index;
  }

  public function next(): void
  {
      ++$this->_index;
  }

  public function rewind(): void
  {
      $this->_index = 0;
  }

  public function valid(): bool
  {
      if ($this->_index < count($this->_items)) {
          return true;
      } else {
          return false;
      }
  }

  public function toJson() {
       return json_encode($this->response);
  }


}

?>
