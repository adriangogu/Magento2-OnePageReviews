<?php

namespace Ileen\OnePageReviews\Block;


/**
 * Ileen_OnePageReviews
 * @author     Ileen Shop - Adrian Gogu <adrian@ileen.ro>
 */
class OnePageReviews extends \Magento\Framework\View\Element\Template
{
    
    
    
    public function __construct(
     \Magento\Framework\View\Element\Template\Context $context,
     \Magento\Review\Model\ResourceModel\Review\Product\CollectionFactory $_reviewsColFactory,
     \Ileen\OnePageReviews\Helper\Data $helper  
    )
    {
    
     $this->_reviewsColFactory = $_reviewsColFactory;
     parent::__construct($context);
     $this->helper = $helper;
    
    } 
    
    protected function _construct()
    {
        parent::_construct();
       
        
        $collection = $this->_reviewsColFactory->create()->addStoreFilter(
                $this->_storeManager->getStore()->getId()
            )->addStatusFilter(
                \Magento\Review\Model\Review::STATUS_APPROVED
            )
            
            ->setDateOrder();
            
        $this->setCollection($collection);
    }

    
   public function _prepareLayout()
    {
        parent::_prepareLayout();
        
        $pager = $this->getLayout()->createBlock(
           'Magento\Theme\Block\Html\Pager',
           'ileen_onepagereviews.pager'
        )->setTemplate('Ileen_OnePageReviews::html/pager.phtml');
        
        
        $pager->setShowAmounts(true)->setCollection($this->getCollection());
        
        $this->setChild('pager', $pager);
        
        $pagetitle = $this->helper->getTitle();
        
        if(!empty( $pagetitle ))
            $this->pageConfig->getTitle()->set($pagetitle);
        else
             $this->pageConfig->getTitle()->set(__('Reviews'));
 
        return $this;
        
        
    }
    
    public function getPagerHtml()
    {
    return $this->getChildHtml('pager');
    }
    
    protected function _beforeToHtml()
    {
        $this->getCollection()->load()->addReviewSummary();
        return parent::_beforeToHtml();
    }
}