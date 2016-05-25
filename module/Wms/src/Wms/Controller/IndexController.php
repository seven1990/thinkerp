<?php

namespace Wms\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
	protected $stockTable;
    public function indexAction()
    {
        $stock = $this->getStockTable()->fetchAll();
        var_dump($dbAdapters);
        return new ViewModel();
    }
    public function getStockTable()
    {
        if (!$this->stockTable) {
            $sm = $this->getServiceLocator();
            $this->stockTable = $sm->get('Wms\Model\StockTable');
        }
        return $this->stockTable;
    }
}
