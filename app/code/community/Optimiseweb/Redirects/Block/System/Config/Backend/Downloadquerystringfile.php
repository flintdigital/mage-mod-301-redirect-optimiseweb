<?php

/**
 * Optimiseweb Redirects Block System Config Backend Downloadquerystringfile
 *
 * @package     Optimiseweb_Redirects
 * @author      Kathir Vel (sid@optimiseweb.co.uk)
 * @copyright   Copyright (c) 2015 Kathir Vel
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Optimiseweb_Redirects_Block_System_Config_Backend_Downloadquerystringfile extends Mage_Adminhtml_Block_System_Config_Form_Field
{

    /**
     * Get the system config field and insert a HTML link
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $store = Mage::app()->getRequest()->getParam('store');
        $website = Mage::app()->getRequest()->getParam('website');
        if ($store) {
            $storeData = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', $store)->getFirstItem();
            $storeId = $storeData->getStoreId();
            $fileName = Mage::getStoreConfig('optimisewebredirects/querystring/upload', $storeId);
        } elseif ($website) {
            $websiteData = Mage::getModel('core/website')->getCollection()->addFieldToFilter('code', $website)->getFirstItem();
            $websiteId = $websiteData->getWebsiteId();
            $fileName = Mage::app()->getWebsite($websiteId)->getConfig('optimisewebredirects/querystring/upload');
        } else {
            $fileName = Mage::getStoreConfig('optimisewebredirects/querystring/upload');
        }

        $this->setElement($element);

        if ($fileName) {
            $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'optimiseweb/redirects/' . $fileName;
            $html = "<a href='" . $url . "'>Download</a>";
        } else {
            $html = "No CSV file provided.";
        }
        return $html;
    }

}
