<?php
class Excellence_Test_Block_Test extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getTest()     
     { 
        if (!$this->hasData('test')) {
            $this->setData('test', Mage::registry('test'));
        }
        return $this->getData('test');
        
    }
    
    public function showTable($module){
        $data = Mage::getModel('test/'.$module)->showData();
        return $data;
    }
    public function getEditUrl($module_name, $row_id){
        return Mage::getUrl('test/index/edit', array('module_name' => $module_name, 'id'=>$row_id));
    }

    public function getDeleteUrl($module_name, $row_id){
        return Mage::getUrl('test/index/delete', array('module_name' => $module_name, 'id'=>$row_id));
    }

    public function getAddUrl($module_name){
        return Mage::getUrl('test/index/add', array('module_name' => $module_name));
    }





    public function saveEdit($id, $title, $content, $status)
    {
        $news = Mage::getModel('test/test')->load($id);
        $news->setTitle($title);
        $news->setContent($content);
        $news->setStatus($status);
        $news->setUpdateTime(NOW());
        $news->save();
        if($news->save()){
            Mage::getSingleton('core/session')->addSuccess("Edit Successful");
            session_write_close(); 
            Mage::app()->getResponse()->setRedirect("http://127.0.0.1/MJ/magento/index.php/test/")->sendResponse();
        }
        else{
            Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
            session_write_close();
        }
    }
    public function saveEdit2($id, $title, $content, $status)
    {
        $news = Mage::getModel('test/test2')->load($id);
        $news->setTitle($title);
        $news->setContent($content);
        $news->setStatus($status);
        $news->setUpdateTime(NOW());
        if($news->save()){
            Mage::getSingleton('core/session')->addSuccess("Edit Successful");
            session_write_close(); 
            Mage::app()->getResponse()->setRedirect("http://127.0.0.1/MJ/magento/index.php/test/")->sendResponse();
        }
        else{
            Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
            session_write_close();
        }
    }
    public function saveAdd($title, $content, $status)
    {
        $news = Mage::getModel('test/test');
        $news->setTitle($title);
        $news->setContent($content);
        $news->setStatus($status);
        $news->setCreatedTime(NOW());
        $news->setUpdateTime(NOW());
        if($news->save()){
            Mage::getSingleton('core/session')->addSuccess("Row Added");
            session_write_close(); 
            Mage::app()->getResponse()->setRedirect("http://127.0.0.1/MJ/magento/index.php/test/")->sendResponse();
        }
        else{
            Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
            session_write_close();
        }
    }
    public function saveAdd2($title, $content, $status)
    {
        $news = Mage::getModel('test/test2');
        $news->setTitle($title);
        $news->setContent($content);
        $news->setStatus($status);
        $news->setCreatedTime(NOW());
        $news->setUpdateTime(NOW());
        $news->save();
        if($news->save()){
            Mage::getSingleton('core/session')->addSuccess("Row Added");
            session_write_close(); 
            Mage::app()->getResponse()->setRedirect("http://127.0.0.1/MJ/magento/index.php/test/")->sendResponse();
        }
        else{
            Mage::getSingleton('core/session')->addError("Some Error Occured.... Please try again...");
            session_write_close();
        }
    }
}