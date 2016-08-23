<?php

namespace Ileen\OnePageReviews\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    
    
    const XML_PATH_ENABLED = 'onepagereviews/general/enabled';
    const XML_PATH_URL = 'onepagereviews/general/url';
    const XML_PATH_TITLE = 'onepagereviews/general/title';


    public function isEnabled()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    
    public function getUrl()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_URL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
    }
    
    public function getTitle()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_TITLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        
    }
    
   

}
