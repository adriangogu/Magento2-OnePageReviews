<?php

namespace Ileen\OnePageReviews\Controller;

/**
 * OnePageReviews Controller Router
 *
 * @author      Adrian Gogu <adrian@ileen.ro>
 */
class Router implements \Magento\Framework\App\RouterInterface
{
  
   protected $actionFactory;
   
   protected $helper;

   
   public function __construct(
   
   \Magento\Framework\App\ActionFactory $actionFactory,
   \Ileen\OnePageReviews\Helper\Data $helper
  
     
   ){
   
   $this->actionFactory = $actionFactory;
   $this->helper = $helper;
     
   }
   
   
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        
        if(!$this->helper->isEnabled())
        return null;
        
        $identifier = trim($request->getPathInfo(), '/');
        $onepagereviews_url = trim($this->helper->getUrl());
        
        if(empty($onepagereviews_url) || $identifier != $onepagereviews_url)
        return null;
      
       
        $request->setModuleName('onepagereviews')->setControllerName('page')->setActionName('view');

        return $this->actionFactory->create('Magento\Framework\App\Action\Forward');
    
    
    }
}
