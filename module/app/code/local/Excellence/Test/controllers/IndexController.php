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
    public function addAction(){
    	$this->loadLayout();     
		$this->renderLayout();
		$module_name = Mage::app()->getRequest()->getParam("module_name");
		$post = Mage::app()->getRequest()->getParams();
		if(isset($post['sub']) && !empty($post['title']) && !empty($post['content'])){
			if(Mage::getModel('test/'.$module_name)->saveRow($post)){
				Mage::getSingleton('core/session')->addSuccess("Row Inserted");
				session_write_close(); 
				$this->_redirect('test/index/index');
			}
			else{
				Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
				session_write_close();
			}
		}
		else{
			Mage::getSingleton('core/session')->addNotice("Please Fill all the fields correctly...");
			session_write_close();
		}
    }
}