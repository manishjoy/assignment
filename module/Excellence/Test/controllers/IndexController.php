<?php
class Excellence_Test_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$this->loadLayout();     
		$this->renderLayout();
    }
    public function deleteAction(){
    	$this->loadLayout();     
		$this->renderLayout();

		$id = Mage::app()->getRequest()->getParam("id");
		$module_name = Mage::app()->getRequest()->getParam("module_name");
		//Mage::getModel('test/'.$module_name)->deleteRow($id);
		if(Mage::getModel('test/'.$module_name)->deleteRow($id)){
			Mage::getSingleton('core/session')->addSuccess("Row Deleted");
			session_write_close(); 
			$this->_redirect('test/index/index');
		}
		else{
			Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
			session_write_close();
		}
    }
    public function loadAddAction(){
    	$this->loadLayout();     
		$this->renderLayout();

		$module_name = Mage::app()->getRequest()->getParam("module_name");

		/*$row_data = Mage::app()->getRequest()->getParam("row_data");
		if(isset($row_data)){
				$news->setData($row_data);
			    try{
			                   $news->save();
			                   echo "Data inserted successfully";
			                         
			        }
			               catch(Exception $e){
			                   echo $e->getMessage();
			        }
		}*/
    }
    /*public function deleteAction(){
    	$id = Mage::app()->getRequest()->getParam("id");
    	$news = Mage::getModel('test/test')->load($id);
		if($news->delete()){
			Mage::getSingleton('core/session')->addSuccess("Row Deleted");
			session_write_close(); 
			$this->_redirect('test/index/index');
		}
		else{
			Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
			session_write_close();
		}
    }
    public function delete2Action(){
    	$id = Mage::app()->getRequest()->getParam("id");
    	$news = Mage::getModel('test/test2')->load($id);
		if($news->delete()){
			Mage::getSingleton('core/session')->addSuccess("Row Deleted");
			session_write_close(); 
			$this->_redirect('test/index/index');
			
		}
		else{
			Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
			session_write_close();
		}
    }
    public function addAction(){
    	$this->loadLayout();     
		$this->renderLayout();
    }
    public function add2Action(){
    	$this->loadLayout();     
		$this->renderLayout();
    }
    public function editAction(){
    	$this->loadLayout();     
		$this->renderLayout();
    }*/
}