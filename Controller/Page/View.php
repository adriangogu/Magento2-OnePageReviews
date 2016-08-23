<?php

namespace Ileen\OnePageReviews\Controller\Page;

class View extends \Magento\Framework\App\Action\Action
{
 
    protected $resultPageFactory;
    
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
       
       
    ) {
        
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
      
    }

   
    public function execute()
    {
        
        $resultPage = $this->resultPageFactory->create();
      
        return $resultPage;
   
    }
}
