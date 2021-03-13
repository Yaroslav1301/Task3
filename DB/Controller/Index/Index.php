<?php
namespace Task3\DB\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Task3\DB\Model\PostFactory $postFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }


    public function execute()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection()->addFieldToFilter('Category',['eq'=>'fruits']);
        $collection->addFieldToSelect(['name', 'url_key', 'tags', 'Category', 'created_at']);
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
