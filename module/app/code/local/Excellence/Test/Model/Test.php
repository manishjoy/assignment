<?php

class Excellence_Test_Model_Test extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/test'); // this is location of the resource file.
    }
    public function deleteRow($id){
    	return $this->load($id)->delete();
    }
    public function saveRow($row_array){
    	return $this->setData($row_array)->save();
    }
    public function showData(){
    	return $this->getCollection();
    }
}