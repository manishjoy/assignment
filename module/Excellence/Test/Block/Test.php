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
        echo "<table border='3' style='width:100%;'><tr><th>".$this->__('Id')."</th><th>".$this->__('Title')."</th><th>".$this->__('Content')."</th><th>".$this->__('Status')."</th><th>".$this->__('Edit')."</th><th>".$this->__('Delete')."</th></tr>";
        $news = Mage::getModel('test/'.$module)->getCollection();
        foreach ($news as $data) {
            echo "<tr>";
            echo "<td>".$data->getId()."</td>";
            echo "<td>".$data->getTitle()."</td>";
            echo "<td>".$data->getContent()."</td>";
            if($data->getStatus()==1){
                echo "<td>".$this->__('Enabled')."</td>";
            }
            else{
                echo "<td>".$this->__('Disabled')."</td>";
            }
                
            echo "<td><a href=".$this->getEditUrl($module, $data->getId()).">".$this->__('Edit')."</a></td>";
            echo "<td><a href=".$this->getDeleteUrl($module, $data->getId()).">".$this->__('Delete')."</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br><h4><a href=".$this->getAddUrl($module).">".$this->__('Add Row')."</a></h4>";
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

    public function addFormHandler(){
        $module_name = Mage::app()->getRequest()->getParam("module_name");
        $title = Mage::app()->getRequest()->getParam("title");
        $content = Mage::app()->getRequest()->getParam("content");
        $status = Mage::app()->getRequest()->getParam("status");
        return Mage::getUrl('test/index/add', array('module_name'=>$module_name, 'title' => $title, 'content' => $content, 'status' => $status));
        //echo $row;
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